<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    const TABLE = 'currencies';

    protected $table = self::TABLE;

    protected $fillable = [
        'symbol',
        'county_id'
    ];

    public function country()
    {
        return $this->belongsToMany(Country::class);
    }
}