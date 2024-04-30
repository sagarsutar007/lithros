<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicants';

   protected $primaryKey = "applicant_id";

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'position',
        'start_date',
        'salary_expectations',
        'education',
        'work_experience',
        'skills',
        'references',
        'cover_letter',
        'resume',
        'additional_info',
        'consent',
    ];
}
