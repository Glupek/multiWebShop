<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'excerpt',
        'product_image',
        'product_price',
        'quantity',
        'category_id'
    ];
    protected $primaryKey = 'product_id';
}
