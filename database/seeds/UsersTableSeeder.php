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
				[
					'name' => 'ISG',
					'email' => 'dealer@mail.in',
					'password' => bcrypt('123'),
					'isDealer' => 1
				],
				[
					'name' => 'Anup',
					'email' => 'client1@mail.in',
					'password' => bcrypt('123'),
					'isDealer' => 0

				],
				[
					'name' => 'Arnab',
					'email' => 'client2@mail.in',
					'password' => bcrypt('123'),
					'isDealer' => 0
				],
				[
					'name' => 'Somak',
					'email' => 'client3@mail.in',
					'password' => bcrypt('123'),
					'isDealer' => 0
				]
			]);
    }  
}
