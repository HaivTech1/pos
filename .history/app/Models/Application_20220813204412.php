<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;

    const TABLE = 'applications';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'alias',
        'regNo',
        'fax',
        'email',
        'line1',
        'line2',
        'image',
        'slogan',
        'motto',
        'address',
        'description',
        'cashier_setting',
        'product_preview',
        'order_invoice_alias',
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function alias(): string
    {
        return $this->alias;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function line1(): string
    {
        return $this->line1;
    }

    public function line2(): string
    {
        return $this->line2;
    }

    public function image(): ?string
    {
        return $this->image;
    }

    public function slogan(): string
    {
        return $this->slogan;
    }

    public function motto(): string
    {
        return $this->motto;
    }

    public function address(): string
    {
        return $this->address;
    }

    public function reg(): string
    {
        return $this->regNo;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('applications')->exists($this->image)) {

            return 'storage/'.$this->image;
        }
        return asset('default.png');
    }
}