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

    public function id(): int
    {
        return $this->id;
    }

    public function qty(): int
    {
        return $this->qty;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function discount(): ?int
    {
        return $this->discount;
    }
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}