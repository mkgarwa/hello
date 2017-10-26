<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    if(Session::get('user')){
        return Redirect::to('/home');
    } else {
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', ['as'=>'home', 'uses'=>'HomeController@index']);
Route::resource('recipe-categories', 'recipeCategoriesController');
Route::resource('recipe-unit', 'recipeUnitController');
Route::resource('recipe-nutritional-element', 'recipeNutritionalElementController');
Route::resource('recipe-visibilities', 'recipeVisibilitiesController');
Route::resource('recipes', 'recipesController');
Route::get('/recipe/delete-image/{id}', 'recipesController@deleteImage');