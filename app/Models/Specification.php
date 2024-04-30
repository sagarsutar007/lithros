<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'product_specifications';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'product_specs_id';

    protected $fillable = [
        'product_id',
        'key',
        'value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
