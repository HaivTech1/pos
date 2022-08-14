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
        'title',
        'iso_code_2',
        'iso_code_3',
     ];
}