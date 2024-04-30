<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasUuids;

    public $table = 'categories';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'primary_img',
        'about',
        'slug',
        'created_by',
        'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


