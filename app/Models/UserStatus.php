<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserStatus
 * 
 * @property int $id
 * @property string $status
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \Illuminate\Database\Eloquent\Collection $user_profiles
 *
 * @package App\Models
 */
class UserStatus extends Eloquent
{
	protected $table = 'user_status';
	public $timestamps = false;

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'status',
		'created',
		'modified'
	];

	public function user_profiles()
	{
		return $this->hasMany(\App\Models\UserProfile::class, 'status');
	}
}
