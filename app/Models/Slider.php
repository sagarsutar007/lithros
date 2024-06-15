<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'sliders';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $primaryKey = 'slider_id';

    protected $fillable = [
        'title',
        'description',
        'slider_img',
    ];

}
