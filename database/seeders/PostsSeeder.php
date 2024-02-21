<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'title' => 'Primer post',
                'comment' => 'Este es el primer post testeando... Hola mundo!! xD',
                'is_active' => 0,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'title' => 'Segundo post',
                'comment' => 'Me llamo Máximo Décimo Meridio, comandante de los Ejércitos del Norte, general de las Legiones Fénix, leal servidor del verdadero emperador Marco Aurelio , padre de un hijo asesinado, marido de una mujer asesinada, y alcanzaré mi venganza en esta vida o en la otra.',
                'is_active' => 0,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'title' => 'Tercer post',
                'comment' => 'Galadriel de los Noldor, Hija de la casa dorada de Finarfin, Comandante de los ejércitos del norte del Alto Rey Gil-Galad.',
                'is_active' => 0,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
        ]);
    }
}
