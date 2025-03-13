<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobInfo extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'designation_id',
        'job_type_id',
        'min_experience',
        'max_experience',
        'min_salary',
        'max_salary',
        'no_of_position',
        'job_shift',
        'gender',
        'job_expiry_date',
        'job_contact_email',
        'location',
        'job_description',
        'job_requirement',
        'created_by',
    ];

    public function skills()
    {
        return $this->belongsToMany(JobSkill::class, 'job_skills'); // Define pivot table if needed
    }
}
