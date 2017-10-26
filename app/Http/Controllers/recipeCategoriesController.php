<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\recipeCategory;
use Illuminate\Http\Request;
use Session;

class recipeCategoriesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $recipecategories = recipeCategory::where('name','LIKE', '%'.$keyword.'%')
                ->orderBy('modified','desc')
                ->paginate($perPage);
        } else {
            $recipecategories = recipeCategory::orderBy('modified','desc')->paginate($perPage);
        }

        return view('recipe-categories.index', compact('recipecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('recipe-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();

        if($request->file('icon') !== null) {
            $requestData['icon'] = $request->file('icon')->getClientOriginalName();
        }

        $validator = $this->validate($request, $this->rules($request));

        if ($validator && $validator->fails()) {
            return redirect('recipe-categories/create')->withErrors($validator);
        }
        $requestData['created'] = date('Y-m-d H:i:s');
        recipeCategory::create($requestData);

        Session::flash('flash_message', 'recipeCategory added!');

        return redirect('recipe-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $recipecategory = recipeCategory::where(['slug'=>$slug])->first();

        return view('recipe-categories.show', compact('recipecategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     *
     * @return \Illuminate\View\View
     */
    public function edit($slug)
    {
        $recipecategory = recipeCategory::where(['slug'=>$slug])->first();

        return view('recipe-categories.edit', compact('recipecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $slug
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($slug, Request $request)
    {
        $requestData = $request->all();
        $recipecategory = recipeCategory::where(['slug'=>$slug])->first();
        $img = true;

        if($request->file('icon') !== null) {
            $requestData['icon'] = $request->file('icon')->getClientOriginalName();
        } else {
            $requestData['icon'] = $recipecategory->icon;
            $img = false;
        }
        $request->merge(['icon'=>$requestData['icon']]);

        $validator = $this->validate($request,$this->rules($recipecategory, $img));

        if ($validator && $validator->fails()) {
            return redirect('recipe-categories/'.$slug)->withErrors($validator);
        }

        $recipecategory->update($requestData);

        Session::flash('flash_message', 'Recipe category updated!');

        return redirect('recipe-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($slug)
    {
        recipeCategory::where('slug',$slug)->delete();

        Session::flash('flash_message', 'Recipe Category deleted!');

        return redirect('recipe-categories');
    }
    public function rules($request, $img=true){
        $rule = [
            'name' => "required|unique:recipe_categories,name,$request->id|max:255",
            'slug' => "required|unique:recipe_categories,slug,$request->id|max:255",
        ];
        if($img)
            $rule['icon'] = "required|mimes:png,jpg,jpeg|dimensions:max_width=200,max_height=200";
        return $rule;
    }
}
