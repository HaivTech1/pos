<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;

class Orderdetail extends Model
{
    use HasFactory;
    use HasTimestamps;

    const TABLE = 'orderdetails';
    protected $table = self::TABLE;

    protected $fillable = [
        'order_uuid',
        'product_uuid',
        'quantity',
        'unitprice',
        'amount',
        'discount',
    ];

    protected $cast = [
        'created_at' => 'datetime'
    ];

    protected $with = [
        'order', 'product'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_uuid');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_uuid');
    }

    public function id(): string
    {
        return $this->id;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function discount(): ?int
    {
        return $this->discount;
    }

    public function unitprice(): ?int
    {
        return $this->unitprice;
    }

    public function qty(): ?int
    {
        return $this->quantity;
    }

    public function createdAt(): string
    {
        return $this->created_at->format('d F Y');
    }
    
    public function scopeTodaySales(Builder $query)
    {
        return $query->where('created_at', '>=', date('Y-m-d').' 00:00:00');
    }

    public function scopeYesterdaySales(Builder $query)
    {
        return $query->where('created_at', '>=', date('Y-m-d', strtotime("-1 days")).' 00:00:00');
    }

    public function scopeMonthlySales(Builder $query, $month)
    {
        return $query->where('created_at', '>=', $month.' 00:00:00');
    }

    public function scopeTotalSales(Builder $query)
    {
        return $query->where('created_at', '>=', date('Y-m-d').' 00:00:00');
    }

    public function resultPercentage(): int
    {
        return (int) $percent =  divnum($this->grandTotal() , $this->grandTotalObtainable()) * 100;
    }
}