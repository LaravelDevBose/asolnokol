<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $fillable =['ProviderId', 'provider'];

	//Relationship with User Model
    function user(){
    	return $this->belongsTo(User::class);
    }
}
