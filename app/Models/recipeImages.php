<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 29 Apr 2017 11:15:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RecipeUnit
 *
 * @property int $id
 * @property string $recipe_id
 * @property string $image
 *
 * @package App\Models
 */
class RecipeImages extends Eloquent
{
    public $timestamps = false;

    protected $fillable = [
        'image',
    ];

    public function recipe_image()
    {
        return $this->belongsTo(\App\Models\Recipe::class,'recipe_id');
    }
}
