<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

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