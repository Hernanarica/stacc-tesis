<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$user = User::create([
			'id'         => 1,
			'name'       => 'Admin',
			'lastname'   => 'Admin',
			'email'      => 'admin@gmail.com',
			'category'   => 'admin',
			'password'   => Hash::make('asdf1234'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);
		
		$user->assignRole('admin');
	}
}
