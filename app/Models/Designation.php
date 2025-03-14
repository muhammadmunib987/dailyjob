<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
    public function jobs(){
        return $this->hasMany(JobInfo::class, 'designation_id');
    }
}
