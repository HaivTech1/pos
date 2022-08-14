<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    use HasAuthor;

    protected $fillable = [
        'author_id',
        'product_id',
        'qty',
        'price',
        'created_at',
        'updated_at',
    ];
}