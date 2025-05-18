<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    protected $table = 'job_skills';

    public function jobs()
    {
        return $this->belongsToMany(JobInfo::class, 'job_skill', 'job_skill_id', 'job_info_id');
    }
}
