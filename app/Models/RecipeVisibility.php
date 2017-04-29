<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RecipeVisibility
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $recipes
 *
 * @package App\Models
 */
class RecipeVisibility extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'name',
		'description',
		'created',
		'modified'
	];

	public function recipes()
	{
		return $this->hasMany(\App\Models\Recipe::class, 'visibility_id');
	}
}
