<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    use HasAuthor;

    const TABLE = 'carts';

    protected $table = self::TABLE;

    protected $fillable = [
        'author_id',
        'product_id',
        'qty',
        'price',
        'discount'
    ];

    public function id(): string
    {
        return $this->id;
    }

    public function qty(): string
    {
        return $this->qty;
    }

    public function price(): string
    {
        return $this->price;
    }

    public function discount(): string
    {
        return $this->discount;
    }
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}