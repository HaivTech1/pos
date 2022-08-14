<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $application = [
            [
            'id'        => 1,
            'name'      =>  'haivtech',
            'alias'     =>  'CL',
            'email'     =>  'haivtech@gmail.com',
            'line1'        =>  '09066100815',
            'line2'        =>  '09066100815',
            'image'      =>  'applications/haivtech.png',
            'address'       =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis',
            'motto'     =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis',
            'slogan'        =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis',
            'regNo'        =>  'RC43243',
            'description'       =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'currency'      => 'Naira',
            'symbol'        => '#',
            'decimal_number'        => '2',
            'transac_report_alias'      => 'trx',
            'order_invoice_alias'       => 'ord',
            'section'       => '1',
            'tax'       => 500,
            ],
        ];
        
        Application::insert($application);
    }
}