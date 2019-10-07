<?php

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
        DB::table('users')->insert([
            'name' => 'Luigi Maroncelli',
            'email' => 'lmaroncelli@gmail.com',
            'password' => bcrypt('Labietta'),
        ]);
    }
}
