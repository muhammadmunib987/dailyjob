<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function jobs(){
        return $this->hasMany(JobInfo::class, 'category_id'); // Assuming `category_id` is the foreign key
    }
}
