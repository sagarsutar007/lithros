<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';

   protected $primaryKey = "career_id";

    protected $fillable = [
        'job_title',
        'job_type',
        'type',
        'job_location',
        'salary',
        'working_days',
        'working_hours',
        'skills_required',
        'education_required',
        'job_description',
    ];

}
