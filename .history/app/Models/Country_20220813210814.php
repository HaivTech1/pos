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

    public function id(): string
    {
        return $this->id;
    }
    
    public function title(): string
    {
        return $this->title;
    }

    public function iso2(): string
    {
        return $this->iso;
    }
    
    public function is03(): string
    {
        return $this->iso_code_3;
    }
}