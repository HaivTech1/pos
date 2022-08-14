<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    use HasAuthor;

    protected $fillable = [
        'product_id',
        'author_id',
        'product_qty',
        'product_price',
        'created_at',
        'updated_at',
    ];
}