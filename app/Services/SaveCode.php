<?php

namespace App\Services;

class SaveCode
{

    public static function Generator($table, $model, $trow)
    {
        $data = $table::orderBy('uuid', 'desc')->first();
        $model->$trow = '#prd'.str_pad(rand(10,100) + 1, 5, "0", STR_PAD_LEFT);
        $model->save();
    }

}