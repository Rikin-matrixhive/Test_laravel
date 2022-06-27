<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'pname',
        'category',
        'subcategory',
        'price',
        'pic',
        'desc',
        'status',
        'quantity',
    ];
}
