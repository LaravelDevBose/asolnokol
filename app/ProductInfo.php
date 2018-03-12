<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    protected $fillable = [
        'productName', 'categoryeId', 'manufacturerId','shortDescription',
        'longDescription','publicationStatus',
    ];
}
