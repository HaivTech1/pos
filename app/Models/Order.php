<?php

namespace App\Models;

use App\Traits\HasUuid;
use App\Traits\HasAuthor;
use App\Traits\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use HasTimestamps;
    use HasAuthor;
    use HasUuid;

    const TABLE = 'orders';
    protected $table = self::TABLE;

    protected $fillable = [
        'uuid',
        'name',
        'phone',
        'payment_method',
        'payment',
        'balance',
        'barcode',
        'author_id'
    ];

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;

    public function id(): string
    {
        return $this->uuid;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function phone(): string
    {
        return $this->phone;
    }

    public function barcode(): string
    {
        return $this->barcode;
    }

    public function method(): string
    {
        return $this->payment_method;
    }

    public function payment(): string
    {
        return $this->payment;
    }

    public function balance(): string
    {
        return $this->balance;
    }
    
    public function createdAt(): string
    {
        return $this->created_at->format('d F Y');
    }

    public function scopeLoadLatest(Builder $query, $count = 4)
    {
        return $query->inRandomOrder()
            ->paginate($count);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        return $query->where(function($query) use ($term) {
            $query->where('uuid', 'like', $term);
        });
    }

    public function orderdetail()
    {
        return $this->hasMany(Orderdetail::class, 'order_uuid');
    }

    public function scopeMonthlySales(Builder $query, $month)
    {
        return $query->where('created_at', '=', $month.' 00:00:00');
    }
}