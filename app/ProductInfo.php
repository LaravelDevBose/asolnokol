<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    protected $fillable = [
        'productName', 'categoryeId', 'manufacturerId','identify','shortDescription',
        'longDescription','fackProductLongDescription','publicationStatus',
    ];
}
