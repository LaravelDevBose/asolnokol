<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsInfo extends Model
{
    protected $fillable = [
        'houseNo', 'roadNo', 'block','policeStation',
        'district','postalCode','phoneNo','emailAddress','publicationStatus',
    ];
}
