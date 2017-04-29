<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RecipeCommentReply
 * 
 * @property int $id
 * @property int $comment_id
 * @property string $reply
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\RecipeComment $recipe_comment
 *
 * @package App\Models
 */
class RecipeCommentReply extends Eloquent
{
	protected $table = 'recipe_comment_reply';
	public $timestamps = false;

	protected $casts = [
		'comment_id' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'comment_id',
		'reply',
		'created',
		'modified'
	];

	public function recipe_comment()
	{
		return $this->belongsTo(\App\Models\RecipeComment::class, 'comment_id');
	}
}
