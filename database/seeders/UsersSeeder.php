<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
            'id' => 1,
            'name' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@gmail.com',
            'category' => 'admin',
            'image' => 'https://i.pravatar.cc/350',
            'password' => Hash::make('asdf1234'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $userOwner = User::create([
            'id' => 2,
            'name' => 'Hernan',
            'lastname' => 'Arica',
            'email' => 'hernanaricammm@gmail.com',
            'category' => 'owner',
            'image' => 'https://i.pravatar.cc/350',
            'password' => Hash::make('asdf1234'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $userVisitor = User::create([
            'id' => 3,
            'name' => 'Albert',
            'lastname' => 'Villarroel',
            'email' => 'zonecero777@gmail.com',
            'image' => 'https://i.pravatar.cc/350',
            'category' => 'visitor',
            'password' => Hash::make('asdf1234'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $userAdmin->assignRole('admin');
        $userOwner->assignRole('owner');
        $userVisitor->assignRole('visitor');

        User::factory(20)->create();
    }
}
