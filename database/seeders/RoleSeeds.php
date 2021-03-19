<?php

namespace Database\Seeders;

use App\Models\Ability;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'master',
        ]);

        DB::table('roles')->insert([
            'name' => 'manager',
        ]);

        DB::table('roles')->insert([
            'name' => 'customer',
        ]);

        DB::table('abilities')->insert([
            'name' => 'take_seat',
        ]);

        DB::table('abilities')->insert([
            'name' => 'create_bus',
        ]);

        DB::table('abilities')->insert([
            'name' => 'create_fleet',
        ]);

        DB::table('generals')->insert([
            'role' => 'customer',
            'price' => 'Free',
            'ability1' => 'Send and Receive Packages',
            'ability2' => 'Support',
            'ability3' => 'Buy seats',
        ]);

        DB::table('generals')->insert([
            'role' => 'manager',
            'price' => '20,000',
            'ability1' => 'Send and Receive Packages',
            'ability2' => 'Support',
            'ability3' => 'Buy seats',
            'ability4' => 'Car Pooling',
            'ability5' => 'Manage Bus',
            'ability6' => 'Manage seats',
        ]);

        DB::table('generals')->insert([
            'role' => 'master',
            'price' => '80,000',
            'ability1' => 'Send and Receive Packages',
            'ability2' => 'Support',
            'ability3' => 'Buy seats',
            'ability4' => 'Car Pooling',
            'ability5' => 'Manage Bus',
            'ability6' => 'Manage seats',
            'ability7' => 'Manage Multiple Buses',
            'ability8' => 'Assets Insights and Support',
        ]);

        DB::table('ability_role')->insert([
            'role_id'=>1,
            'ability_id'=>1
        ]);

        DB::table('ability_role')->insert([
            'role_id'=>1,
            'ability_id'=>2
        ]);

        DB::table('ability_role')->insert([
            'role_id'=>1,
            'ability_id'=>3
        ]);

        DB::table('ability_role')->insert([
            'role_id'=>2,
            'ability_id'=>1
        ]);

        DB::table('ability_role')->insert([
            'role_id'=>2,
            'ability_id'=>2
        ]);

        DB::table('founders')->insert([
            'name'=>'Yusuph Kapilimka',
            'position'=>'CEO',
            'email'=>'yusuph@tikety.co.tz',
            'phone_number'=>'+255759777031',
            'story'=>'Enterpreneur, Problem Solver and Innovator',
            'image_url'=>'https://tikety.fra1.digitaloceanspaces.com/founders/kp.PNG',
            'twitter'=>'https://twitter.com/YusuphKapilimka',
            'facebook'=>'https://www.facebook.com/yusuphg.kapilimka',
            'linkedin'=>'https://www.linkedin.com/in/kptechnologiez/',
            'instagram'=>'https://www.instagram.com/yusuph_kapilimka/'
        ]);

        DB::table('founders')->insert([
            'name'=>'Kea Rajabu',
            'position'=>'CTO',
            'email'=>'kea@tikety.co.tz',
            'phone_number'=>'+255654660654',
            'story'=>'Enterpreneur, Innovator and Leadership Enthusiast',
            'image_url'=>'https://tikety.fra1.digitaloceanspaces.com/founders/kea.jpg',
            'twitter'=>'https://twitter.com/kearajab137',
            'facebook'=>'https://www.facebook.com/Kea.Rajab.Kea',
            'linkedin'=>'https://www.linkedin.com/in/kea-rajab/',
            'instagram'=>'https://www.instagram.com/kea_rajab/'
        ]);

        DB::table('events')->insert([
            'title'=>'Applications',
            'time'=>'May 26, 2021 12:00:00',
            'link'=>'about'
        ]);

    }
}
