<?php

namespace App;

use App\Models\Application;

class NullApplication extends Application
{
    protected $attributes = [
        'name' => 'Omotayo & Sons',
        'alias'=> 'HT',
        'fax' => 33553,
        'email'=> 'haivtechent@gmail.com',
        'line1'=> '09066100815',
        'line2'=> '09066100815',
        'image'=> 'applications/haivtech.png',
        'slogan'=> 'Default slogan',
        'motto'=> 'Default motto',
        'whatsapp'=> 'Default whatsapp',
        'facebook'=> 'Default facebook',
        'instagram'=> 'Default instagram',
        'address'=> 'Default address',
        'regNo'=> 'RC45466',
        'description'=> 'Default descrption',
        'currency'      => 'Naira',
        'symbol'        => '₦',
        'decimal_number'        => '2',
        'transac_report_alias'      => 'trx',
        'order_invoice_alias'       => 'ord',
        'section'       => '1',
        'tax'       => 500,
    ];
}