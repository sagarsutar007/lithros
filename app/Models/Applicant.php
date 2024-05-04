<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'applicants';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'applicant_id';

    protected $fillable = [
        'name',
        'phone',
        'gender',
        'email',
        'profile_img',
        'permanent_address',
        'present_address',
        'cv',
    ];
}
