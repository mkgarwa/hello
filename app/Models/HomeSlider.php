<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class HomeSlider
 * 
 * @property int $id
 * @property string $img_src
 * @property string $caption
 * @property string $subheading
 * @property \Carbon\Carbon $created
 * @property \Carbon\Carbon $updated
 *
 * @package App\Models
 */
class HomeSlider extends Eloquent
{
	protected $table = 'home_slider';
	public $timestamps = false;

	protected $dates = [
		'created',
		'updated'
	];

	protected $fillable = [
		'img_src',
		'caption',
		'subheading',
		'created',
		'updated'
	];
}
