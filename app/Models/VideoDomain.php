<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class VideoDomain
 *
 * @property int $id
 * @property string $domain
 * @property string $embed
 * @property \Carbon\Carbon $created
 *
 * @property \Illuminate\Database\Eloquent\Collection $recipes
 *
 * @package App\Models
 */
class VideoDomain extends Eloquent
{
    public $timestamps = false;

    protected $dates = [
        'created'
    ];

    protected $fillable = [
        'domain',
        'embed',
        'created'
    ];
}
