<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // 'name' => 'admin',
            'email' => 'admin@email.com',
            // 'username' => 'uc_admin2021',
            'password' => bcrypt('ADJMV_internship'),
        ]);
    }
}
