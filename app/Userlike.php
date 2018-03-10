<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlike extends Model
{
    protected $fillable = [
        'productId',  'totalLikes'
    ];
}
