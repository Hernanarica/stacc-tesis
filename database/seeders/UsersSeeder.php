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
		$userAdmin = User::create([
			'id'         => 1,
			'name'       => 'Admin',
			'lastname'   => 'Admin',
			'email'      => 'admin@gmail.com',
			'category'   => 'admin',
			'password'   => Hash::make('asdf1234'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);

		$userOwner = User::create([
			'id'         => 2,
			'name'       => 'Owner',
			'lastname'   => 'Owner',
			'email'      => 'owner@gmail.com',
			'category'   => 'owner',
			'password'   => Hash::make('asdf1234'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);

		$userVisitor = User::create([
			'id'         => 3,
			'name'       => 'Visitor',
			'lastname'   => 'Visitor',
			'email'      => 'visitor@gmail.com',
			'category'   => 'visitor',
			'password'   => Hash::make('asdf1234'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);
		
		$userAdmin->assignRole('admin');
		$userOwner->assignRole('owner');
		$userVisitor->assignRole('visitor');
		
		User::factory(20)->create();
	}
}
