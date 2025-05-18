<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'designation_id',
        'short_description',
        'content',
        'feature_image',
        'tags',
        'status',
        'published_at',
        'created_by',
        'updated_by',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
