<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'image',
        'status',
    ];
    //
    public function jobs(){
        return $this->hasMany(JobInfo::class, 'designation_id');
    }
}
