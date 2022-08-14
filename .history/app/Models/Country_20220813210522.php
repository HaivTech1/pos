<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    const TABLE = 'countries';

    protected $table = self::TABLE;

    protected $fillable = [
        'time_end',
        'time_start',
        'author_id'
     ];
}