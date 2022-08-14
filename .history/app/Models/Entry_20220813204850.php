<?php

namespace App\Models;

use App\Traits\HasAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entry extends Model
{
    use HasFactory;
    use HasAuthor;

    const TABLE = 'contests';

    protected $table = self::TABLE;

    protected $fillable = [
        'time_end',
        'time_start',
        'author_id'
     ];

     
    protected $casts = [
        'isAvailable'  => 'boolean',
        'start' => 'datetime',
        'end' => 'datetime',
    ];
}