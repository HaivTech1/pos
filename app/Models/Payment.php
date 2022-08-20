<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    use HasAuthor;

    
    const TABLE = 'payments';
    protected $table = self::TABLE;

    protected $fillable = [
        'author_id'
    ];

    protected $with = [
        'authorRelation'
    ];
}