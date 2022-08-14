<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    'product_id',
    'author_id',
    'product_qty',
    'product_price',
    use HasFactory;
}