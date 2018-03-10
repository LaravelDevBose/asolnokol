<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainMenuInfo extends Model
{
    protected $fillable = [
        'menuName','position','childId','menuUrl','publicationStatus',
    ];
}
