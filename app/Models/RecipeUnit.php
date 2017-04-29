<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RecipeUnit
 * 
 * @property int $id
 * @property string $unit
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $recipe_nutritional_elements_maps
 *
 * @package App\Models
 */
class RecipeUnit extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'unit',
		'created',
		'modified'
	];

	public function recipe_nutritional_elements_maps()
	{
		return $this->hasMany(\App\Models\RecipeNutritionalElementsMap::class, 'unit_id');
	}
}
