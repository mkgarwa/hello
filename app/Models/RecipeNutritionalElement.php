<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RecipeNutritionalElement
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $recipe_nutritional_elements_maps
 *
 * @package App\Models
 */
class RecipeNutritionalElement extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'name',
		'slug',
		'created',
		'modified'
	];

	public function recipe_nutritional_elements_maps()
	{
		return $this->hasMany(\App\Models\RecipeNutritionalElementsMap::class, 'element_id');
	}
}
