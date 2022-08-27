<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Supplier extends Model
{
    use HasFactory;
    use HasAuthor;

    const TABLE = 'suppliers';
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'email',
        'phone',
        'address',
        'brand_id',
        'author_id',
        'status'
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function phone(): string
    {
        return $this->phone;
    }

    public function address(): string
    {
        return $this->address;
    }

    public function brand(): BelongsToMany 
    {
        return $this->belongsToMany(Brand::class, 'brand_supplier');
    }
}