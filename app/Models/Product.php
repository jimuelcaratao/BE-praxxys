<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'manual_date',
        'manual_time',

    ];

    public function product_images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }
}
