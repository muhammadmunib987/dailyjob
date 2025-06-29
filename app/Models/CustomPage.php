<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPage extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'content',
        'banner_image',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
    ];
}
