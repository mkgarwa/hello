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
 * @property \Carbon\Carbon $modifed
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
		'modifed'
	];

	protected $fillable = [
		'name',
		'slug',
		'icon',
		'created',
		'modifed'
	];

	public function recipes()
	{
		return $this->hasMany(\App\Models\Recipe::class);
	}
}
