<?php

use Illuminate\Database\Seeder;

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
            'name' => 'fabrica',
            'username' => 'fabricaapp',
            'password' => bcrypt('secret'),
            'admin' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'lasconf',
            'username' => 'lasconfadmin',
            'password' => bcrypt('testes'),
            'admin' => 1
        ]);

        
    }
}
