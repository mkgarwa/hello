<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserProfile
 * 
 * @property int $id
 * @property int $role
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $contact
 * @property string $email
 * @property string $gender
 * @property string $avatar
 * @property string $facebook_id
 * @property string $google_id
 * @property int $status
 * @property \Carbon\Carbon $last_login
 * @property string $activation_key
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $modified
 * 
 * @property \App\Models\UserRole $user_role
 * @property \App\Models\UserStatus $user_status
 * @property \Illuminate\Database\Eloquent\Collection $recipe_comments
 * @property \Illuminate\Database\Eloquent\Collection $recipes
 *
 * @package App\Models
 */
class UserProfile extends Authenticatable
{
    use Notifiable;

	public $timestamps = false;

	protected $casts = [
		'role' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'last_login',
		'created',
		'modified'
	];

	protected $hidden = [
		'password',
	];

	protected $fillable = [
		'role',
		'password',
		'first_name',
		'last_name',
		'contact',
		'email',
		'gender',
		'avatar',
		'facebook_id',
		'google_id',
		'status',
		'last_login',
		'activation_key',
		'created',
		'modified'
	];

	public function user_role()
	{
		return $this->belongsTo(\App\Models\UserRole::class, 'role');
	}

	public function user_status()
	{
		return $this->belongsTo(\App\Models\UserStatus::class, 'status');
	}

	public function recipes()
	{
		return $this->hasMany(\App\Models\Recipe::class, 'user_id');
	}
}
