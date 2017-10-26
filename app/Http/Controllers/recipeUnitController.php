<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\recipeUnit;
use Illuminate\Http\Request;
use Session;

class recipeUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage =10;

        if (!empty($keyword)) {
            $recipeunit = recipeUnit::where('unit','LIKE', '%'.$keyword.'%')
                ->orderBy('modified','desc')
                ->paginate($perPage);
        } else {
            $recipeunit = recipeUnit::orderBy('modified','desc')->paginate($perPage);
        }

        return view('recipe-unit.index', compact('recipeunit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('recipe-unit.create');
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
            return redirect('recipe-unit/create')->withErrors($validator);
        }
        $requestData['created'] = date('Y-m-d H:i:s');

        recipeUnit::create($requestData);

        Session::flash('flash_message', 'Recipe unit added!');

        return redirect('recipe-unit');
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
        $recipeunit = recipeUnit::where(['unit'=>$slug])->first();

        return view('recipe-unit.show', compact('recipeunit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($slug)
    {
        $recipeunit = recipeUnit::where(['unit'=>$slug])->first();

        return view('recipe-unit.edit', compact('recipeunit'));
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
        
        $recipeunit = recipeUnit::where(['unit'=>$slug])->first();
        $recipeunit->update($requestData);

        Session::flash('flash_message', 'recipeUnit updated!');

        return redirect('recipe-unit');
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
        recipeUnit::where('unit',$slug)->delete();

        Session::flash('flash_message', 'recipeUnit deleted!');

        return redirect('recipe-unit');
    }

    public function rules($request){
        $rule = [
            'unit' => "required|unique:recipe_units,unit,$request->id|max:255",
        ];
        return $rule;
    }
}
