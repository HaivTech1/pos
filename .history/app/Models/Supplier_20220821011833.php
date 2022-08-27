<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'author_id'
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}