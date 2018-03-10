<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogContent extends Model
{
    protected $fillable = [
        'authorName', 'blogTitel', 'shortDescription',
        'longDescription','publicationStatus'
    ];
}
