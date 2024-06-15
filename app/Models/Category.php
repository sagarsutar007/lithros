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

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}


