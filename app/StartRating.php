<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StartRating extends Model
{
   protected $fillable =['productId', 'rating','totalRating','totalRates','userId'];
}
