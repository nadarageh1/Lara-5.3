<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('admins')->insert([
        	'username' => 'nada1234',
        	'email'    => 'nada@gmail.com',
        	'password' => Hash::make('nada1234'),
        	]);
          DB::table('users')->insert([
            'name' => 'nada1234',
            'email'    => 'nody@gmail.com',
            'password' => Hash::make('nada1234'),
            ]);
    }
}
