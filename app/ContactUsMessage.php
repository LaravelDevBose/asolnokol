<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsMessage extends Model
{
    protected $fillable = [
        'status', 'name', 'email','message' ,'parentsId'
    ];
}
