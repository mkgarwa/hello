<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RecipeComment
 * 
 * @property int $id
 * @property int $recipe_id
 * @property string $comment
 * @property int $user_id
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\Recipe $recipe
 * @property \App\Models\UserProfile $user_profile
 * @property \Illuminate\Database\Eloquent\Collection $recipe_comment_replies
 *
 * @package App\Models
 */
class RecipeComment extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'recipe_id' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'recipe_id',
		'comment',
		'user_id',
		'created',
		'modified'
	];

	public function recipe()
	{
		return $this->belongsTo(\App\Models\Recipe::class);
	}

	public function user_profile()
	{
		return $this->belongsTo(\App\Models\UserProfile::class, 'user_id');
	}

	public function recipe_comment_replies()
	{
		return $this->hasMany(\App\Models\RecipeCommentReply::class, 'comment_id');
	}
}
