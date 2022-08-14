<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    
    public function run()
    {
       
        Property::factory()->count(5)->create(['author_id' => 1, 'property_category_id' => 1]);
        
    }
}