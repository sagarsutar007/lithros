<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    use HasFactory;

    protected $table = 'openings';

   protected $primaryKey = "opening_id";


        protected $fillable = [
            'title',
            'type',
            'experience',
            'education',
            'skills',
            'about',
            'salary',
            'location',
            'working_days',
            'working_hours',
            'created_by',
            'updated_by',
            'slug'
        ];

}
