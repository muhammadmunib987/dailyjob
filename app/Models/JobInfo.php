<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class JobInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'designation_id',
        'job_type_id',
        'education_id',
        'min_experience',
        'max_experience',
        'min_salary',
        'max_salary',
        'no_of_position',
        'job_shift',
        'gender',
        'job_expiry_date',
        'job_contact_email',
        'job_contact_no',
        'location',
        'job_description',
        'job_requirement',
        'how_to_apply',
        'external_website_link',
        'apply_via',
        'document',
        'created_by',
    ];

    public function skills(){
        return $this->belongsToMany(Skill::class, 'job_skills', 'job_info_id', 'job_skill_id');
    }

      // Relationship with Category
      public function category()
      {
          return $this->belongsTo(Category::class, 'category_id');
      }
      public function education()
      {
          return $this->belongsTo(Education::class, 'education_id');
      }
  
      // Relationship with Designation
      public function designation()
      {
          return $this->belongsTo(Designation::class, 'designation_id');
      }
  
      // Relationship with Job Type
      public function jobType()
      {
          return $this->belongsTo(JobType::class, 'job_type_id');
      }

}
