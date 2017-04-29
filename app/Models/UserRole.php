<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserRole
 * 
 * @property int $id
 * @property string $role
 * @property \Carbon\Carbon $created
 * 
 * @property \Illuminate\Database\Eloquent\Collection $user_profiles
 *
 * @package App\Models
 */
class UserRole extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'created'
	];

	protected $fillable = [
		'role',
		'created'
	];

	public function user_profiles()
	{
		return $this->hasMany(\App\Models\UserProfile::class, 'role');
	}
}
