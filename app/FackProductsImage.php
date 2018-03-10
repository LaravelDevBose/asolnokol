<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FackProductsImage extends Model
{
    protected $fillable = [
        'productId','fackProductImageName', 'fackProductImagePath', 
    ];
}
