<?php

namespace App;

use App\Models\Application;

class NullApplication extends Application
{
    protected $attributes = [
        'name' => 'haivtech',
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
        'cashier_setting'           => '',
        'product_preview'           => '',
        'order_invoice_alias'           => '',
        'transac_report_alias'          => '',
        'decimal_number'            => '',
        'symbol'            => '',
        'currency'          => '',
        'tax'           => '',
        'section'       => ''
    ];
}