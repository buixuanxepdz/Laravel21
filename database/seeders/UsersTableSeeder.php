<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->truncate();
        DB::table('users_info')->truncate();
        for($i=1;$i < 20;$i++){
            DB::table('users')->insert([
                'name' => "Admin $i",
                'email' => "admin$i@gmail.com",
                'password' => bcrypt('123456')
            ]);
            DB::table('users_info')->insert([
                'phone' => "0829834234",
                'address' => "Ha noi",
                'user_id' => $i
            ]);
        }
    }
}
