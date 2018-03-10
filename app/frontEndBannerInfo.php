<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class frontEndBannerInfo extends Model
{
    protected $fillable = [
        'companyMoto', 'image','publicationStatus'
    ];
}
