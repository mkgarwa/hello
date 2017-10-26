<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\recipeVisibility;
use Illuminate\Http\Request;
use Session;

class recipeVisibilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $recipevisibilities = recipeVisibility::where('name','LIKE', '%'.$keyword.'%')
                ->orderBy('modified','desc')
                ->paginate($perPage);
        } else {
            $recipevisibilities = recipeVisibility::orderBy('modified','desc')->paginate($perPage);
        }

        return view('recipe-visibilities.index', compact('recipevisibilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('recipe-visibilities.create');
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
            return redirect('recipe-visibilities/create')->withErrors($validator);
        }
        $requestData['created'] = date('Y-m-d H:i:s');

        recipeVisibility::create($requestData);

        Session::flash('flash_message', 'recipeVisibility added!');

        return redirect('recipe-visibilities');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $recipevisibility = recipeVisibility::findOrFail($id);

        return view('recipe-visibilities.show', compact('recipevisibility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $recipevisibility = recipeVisibility::findOrFail($id);

        return view('recipe-visibilities.edit', compact('recipevisibility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $recipevisibility = recipeVisibility::findOrFail($id);

        $validator = $this->validate($request,$this->rules($recipevisibility));

        if ($validator && $validator->fails()) {
            return redirect('recipe-visibilities/'.$id)->withErrors($validator);
        }

        $recipevisibility->update($requestData);

        Session::flash('flash_message', 'recipeVisibility updated!');

        return redirect('recipe-visibilities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        recipeVisibility::destroy($id);

        Session::flash('flash_message', 'Recipe visibility deleted!');

        return redirect('recipe-visibilities');
    }

    public function rules($request){
        $rule = [
            'name' => "required|unique:recipe_visibilities,name,$request->id|max:255",
        ];
        return $rule;
    }
}
