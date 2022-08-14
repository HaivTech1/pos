<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use HasFactory;

    const TABLE = 'currencies';

    protected $table = self::TABLE;

    protected $fillable = [
        'symbol',
        'county_id'
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function id(): string
    {
        return $this->id;
    }
    
    public function symbol(): string
    {
        return $this->symbol;
    }
}