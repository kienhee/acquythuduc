<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'avatar' => '/images/avatar-default.png',
            'full_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'group_id' => 1,
            'created_at' => Date('y-m-d h:m:s'),
            'updated_at' => Date('y-m-d h:m:s'),
        ]);

        DB::table('groups')->insert([
            ['id' => 1, 'name' => "Admin", 'permissions' => '{"dashboard":["view"],"categories":["view","add","edit","delete"],"tags":["view","add","edit","delete"],"posts":["view","add","edit","delete"],"partners":["view","add","edit","delete"],"groups":["view","add","edit","delete","permission"],"users":["view","add","edit","delete"],"media":["view"],"settings":["view"]}'],
            ['id' => 2, 'name' => "Manager", 'permissions' => '{"dashboard":["view"],"categories":["view","add","edit","delete"],"tags":["view","add","edit","delete"],"posts":["view","add","edit","delete"],"partners":["view","add","edit","delete"],"groups":["view","add","edit","delete","permission"],"users":["view","add","edit","delete"],"media":["view"],"settings":["view"]}'],
        ]);
        DB::table('settings')->insert([
            'id' => 1,
            'email' => 'admin@gmail.com',
            'phone' => '03761736282kkk',
            'address' => 'To 3, Phuong My Lam, Tp Tuyen Quang',
        ]);
    }
}
