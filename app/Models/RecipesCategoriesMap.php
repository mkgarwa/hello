<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RecipesCategoriesMap
 * 
 * @property int $id
 * @property string $recipe_id
 * @property int $category_id
 *
 * @property \App\Models\RecipeCategory $recipe_category
 * @property \App\Models\Recipe $recipe
 *
 * @package App\Models
 */
class RecipesCategoriesMap extends Eloquent
{
	protected $table = 'recipes_categories_map';
	public $timestamps = false;

	protected $casts = [
		'recipe_id' => 'int',
		'category_id' => 'int'
	];

	protected $fillable = [
		'recipe_id',
		'category_id',
	];

	public function recipe_category()
	{
		return $this->belongsTo(\App\Models\RecipeCategory::class, 'category_id');
	}

	public function recipe()
	{
		return $this->belongsTo(\App\Models\Recipe::class, 'recipe_id');
	}
}
