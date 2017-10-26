<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\recipeNutritionalElement;
use Illuminate\Http\Request;
use Session;

class recipeNutritionalElementController extends Controller
{
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
            $recipenutritionalelement = recipeNutritionalElement::where('name','LIKE', '%'.$keyword.'%')
                ->orderBy('modified','desc')
                ->paginate($perPage);
        } else {
            $recipenutritionalelement = recipeNutritionalElement::orderBy('modified','desc')->paginate($perPage);
        }

        return view('recipe-nutritional-element.index', compact('recipenutritionalelement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('recipe-nutritional-element.create');
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

        $validator = $this->validate($request, $this->rules($request));

        if ($validator && $validator->fails()) {
            return redirect('recipe-nutritional-element/create')->withErrors($validator);
        }
        $requestData['created'] = date('Y-m-d H:i:s');

        recipeNutritionalElement::create($requestData);

        Session::flash('flash_message', 'recipeNutritionalElement added!');

        return redirect('recipe-nutritional-element');
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
        $recipenutritionalelement = recipeNutritionalElement::where(['slug'=>$slug])->first();

        return view('recipe-nutritional-element.show', compact('recipenutritionalelement'));
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
        $recipenutritionalelement = recipeNutritionalElement::where(['slug'=>$slug])->first();

        return view('recipe-nutritional-element.edit', compact('recipenutritionalelement'));
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
        
        $recipenutritionalelement = recipeNutritionalElement::where(['slug'=>$slug])->first();
        $recipenutritionalelement->update($requestData);

        Session::flash('flash_message', 'recipeNutritionalElement updated!');

        return redirect('recipe-nutritional-element');
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
        recipeNutritionalElement::where('slug',$slug)->delete();

        Session::flash('flash_message', 'recipeNutritionalElement deleted!');

        return redirect('recipe-nutritional-element');
    }
    public function rules($request){
        $rule = [
            'name' => "required|unique:recipe_nutritional_elements,name,$request->id|max:255",
            'slug' => "required|unique:recipe_nutritional_elements,slug,$request->id|max:255",
        ];
        return $rule;
    }
}
