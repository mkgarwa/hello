<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Recipe
 * 
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $ingredients
 * @property string $instructions
 * @property int $preparation_time
 * @property int $cooking_time
 * @property int $serving_people
 * @property string $allow_comments
 * @property int $user_id
 * @property string $featured_image
 * @property int $video_domain_id
 * @property string $video_url
 * @property int $visibility_id
 * @property int $recipe_category_id
 * @property string $is_approved
 * @property string $footnote
 * @property string $tip
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\RecipeCategory $recipe_category
 * @property \App\Models\UserProfile $user_profile
 * @property \App\Models\RecipeVisibility $recipe_visibility
 * @property \App\Models\VideoDomain $video_domain
 * @property \Illuminate\Database\Eloquent\Collection $recipe_comments
 *
 * @package App\Models
 */
class Recipe extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'preparation_time' => 'int',
		'cooking_time' => 'int',
		'serving_people' => 'int',
		'user_id' => 'int',
		'visibility_id' => 'int',
		'video_domain_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'title',
		'slug',
        'description',
        'ingredients',
		'instructions',
		'preparation_time',
		'cooking_time',
		'serving_people',
		'allow_comments',
		'user_id',
		'featured_image',
        'video_domain_id',
		'video_url',
		'visibility_id',
        'is_approved',
        'footnote',
        'tip',
		'created',
		'modified'
	];

	public function recipe_category()
	{
		return $this->hasMany(\App\Models\RecipesCategoriesMap::class,'recipe_id');
	}

    public function recipe_images()
    {
        return $this->hasMany(\App\Models\RecipeImages::class,'recipe_id');
    }

	public function user_profile()
	{
		return $this->belongsTo(\App\Models\UserProfile::class, 'user_id');
	}

	public function recipe_visibility()
	{
		return $this->belongsTo(\App\Models\RecipeVisibility::class, 'visibility_id');
	}
}
