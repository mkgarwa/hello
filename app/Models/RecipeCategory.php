<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RecipeCategory
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $icon
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $recipes
 *
 * @package App\Models
 */
class RecipeCategory extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'name',
		'slug',
		'icon',
		'created',
		'modified'
	];

    public function category_recipe()
    {
        return $this->hasMany(\App\Models\RecipesCategoriesMap::class,'category_id');
    }
}
