<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'product_images';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'product_image_id';

    protected $fillable = [
        'product_id',
        'filename',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
