<?php

namespace App\Models;

use Carbon\Carbon;
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
        'time_end' => 'datetime',
        'time_start' => 'datetime',
    ];

    public function getTotalTimeAttribute()
    {
        $time_start = $this->time_start ? Carbon::createFromFormat('Y-m-d H:i:s', $this->time_start) : null;
        $time_end = $this->time_end ? Carbon::createFromFormat('Y-m-d H:i:s', $this->time_end) : null;

        return $this->time_end ? $time_end->diffInSeconds($time_start) : 0;
    }

    public function getTotalTimeChartAttribute()
    {
        return $this->total_time ? round($this->total_time / 3600, 2) : 0;
    }
}