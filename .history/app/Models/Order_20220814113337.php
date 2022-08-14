<?php

namespace App\Models;

use App\Models\Status;
use App\Traits\HasAuthor;
use App\Models\OrderDetail;
use App\Traits\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use HasTimestamps;
    use HasAuthor;

    const TABLE = 'orders';
    protected $table = self::TABLE;

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'uuid',
        'name',
        'phone',
        'author_id'
    ];

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
        return $this->hasMany(Orderdetails::class);
    }
}