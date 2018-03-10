<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'categoryName', 'shortDescription', 'icon','publicationStatus',
    ];
}
