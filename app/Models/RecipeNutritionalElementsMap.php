<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RecipeNutritionalElementsMap
 * 
 * @property int $id
 * @property string $amount
 * @property int $element_id
 * @property int $unit_id
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\RecipeNutritionalElement $recipe_nutritional_element
 * @property \App\Models\RecipeUnit $recipe_unit
 *
 * @package App\Models
 */
class RecipeNutritionalElementsMap extends Eloquent
{
	protected $table = 'recipe_nutritional_elements_map';
	public $timestamps = false;

	protected $casts = [
		'element_id' => 'int',
		'unit_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'amount',
		'element_id',
		'unit_id',
		'created',
		'modified'
	];

	public function recipe_nutritional_element()
	{
		return $this->belongsTo(\App\Models\RecipeNutritionalElement::class, 'element_id');
	}

	public function recipe_unit()
	{
		return $this->belongsTo(\App\Models\RecipeUnit::class, 'unit_id');
	}
}
