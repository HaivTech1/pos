<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Agent;
use App\Models\Vendor;
use App\Models\Writer;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name'      => 'Shittu Oluwaseun',
            'email'     => 'shittuopeyemi24@gmail.com',
            'password'  => bcrypt('midshot17'),
            'type'      => User::ADMIN,
            'profile_photo_path'  =>  'author-one.jpg',
        ]);

        User::factory()->create([
            'name'      => 'Adesodun Olubunmi',
            'email'     => 'bunmi@gmail.com',
            'password'  => bcrypt('password'),
            'type'      => User::MANAGER,
            'profile_photo_path'    => 'profile-photos/author-two.jpg'
        ]);

        User::factory()->create([
            'name'      => 'Ojo Emmanuel',
            'email'     => 'ojotifeema@gmail.com',
            'password'  => bcrypt('sage17'),
            'type'      => User::AGENT,
            'profile_photo_path'    => 'profile-photos/author-two.jpg'
        ]);


        

        // $user->ownedTeams()->save(Team::forceCreate([
        //     'user_id' => $user->id,
        //     'name' => 'Housing Team',
        //     'personal_team' => true,
        // ]));
    }
}