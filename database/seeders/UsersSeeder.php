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
			'image'      => 'https://us.123rf.com/450wm/artenot/artenot1202/artenot120200116/12487742-divertida-caricatura-de-empleado-de-oficina.jpg?ver=6',
			'password'   => Hash::make('asdf1234'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);

		$userOwner = User::create([
			'id'         => 2,
			'name'       => 'Hernan',
			'lastname'   => 'Arica',
			'email'      => 'hernan@gmail.com',
			'category'   => 'owner',
		    'image' 	 => 'https://i.pravatar.cc/350',
			'password'   => Hash::make('asdf1234'),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);

		$userVisitor = User::create([
			'id'         => 3,
			'name'       => 'Albert',
			'lastname'   => 'Villarroel',
			'email'      => 'beto@gmail.com',
		    'image' 	 => 'https://trome.pe/resizer/lu3BjiBV2ogrUz7C8h200leHJec=/1200x1200/smart/filters:format(jpeg):quality(75)/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/32OSZMYA3ZHOBEURIVCHUASRCM.jpg',
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
