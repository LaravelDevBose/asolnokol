<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{
    protected $fillable = [
        'productId','imageName', 'imagePath', 
    ];
}
