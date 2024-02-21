<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NeighborhoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('neighborhoods')->insert([
            //barrios de argentina
            [
                'id' => 1,
                'name' => 'Abasto',
            ],
            [
                'id' => 2,
                'name' => 'Agronomía',
            ],
            [
                'id' => 3,
                'name' => 'Almagro',
            ],
            [
                'id' => 4,
                'name' => 'Balvanera',
            ],
            [
                'id' => 5,
                'name' => 'Barracas',
            ],
            [
                'id' => 6,
                'name' => 'Belgrano',
            ],
            [
                'id' => 7,
                'name' => 'Boca',
            ],
            [
                'id' => 8,
                'name' => 'Boedo',
            ],
            [
                'id' => 9,
                'name' => 'Caballito',
            ],
            [
                'id' => 10,
                'name' => 'Chacarita',
            ],
            [
                'id' => 11,
                'name' => 'Coghlan',
            ],
            [
                'id' => 12,
                'name' => 'Colegiales',
            ],
            [
                'id' => 13,
                'name' => 'Constitución',
            ],
            [
                'id' => 14,
                'name' => 'Flores',
            ],
            [
                'id' => 15,
                'name' => 'Floresta',
            ],
            [
                'id' => 16,
                'name' => 'La Boca',
            ],
            [
                'id' => 17,
                'name' => 'La Paternal',
            ],
            [
                'id' => 18,
                'name' => 'Liniers',
            ],
            [
                'id' => 19,
                'name' => 'Mataderos',
            ],
            [
                'id' => 20,
                'name' => 'Monserrat',
            ],
            [
                'id' => 21,
                'name' => 'Monte Castro',
            ],
            [
                'id' => 22,
                'name' => 'Nueva Pompeya',
            ],
            [
                'id' => 23,
                'name' => 'Núñez',
            ],
            [
                'id' => 24,
                'name' => 'Palermo',
            ],
            [
                'id' => 25,
                'name' => 'Parque Avellaneda',
            ],
            [
                'id' => 26,
                'name' => 'Parque Chacabuco',
            ],
            [
                'id' => 27,
                'name' => 'Parque Chas',
            ],
            [
                'id' => 28,
                'name' => 'Parque Patricios',
            ],
            [
                'id' => 29,
                'name' => 'Puerto Madero',
            ],
            [
                'id' => 30,
                'name' => 'Recoleta',
            ],
            [
                'id' => 31,
                'name' => 'Retiro',
            ],
            [
                'id' => 32,
                'name' => 'Saavedra',
            ],
            [
                'id' => 33,
                'name' => 'San Cristóbal',
            ],
            [
                'id' => 34,
                'name' => 'San Nicolás',
            ],
            [
                'id' => 35,
                'name' => 'San Telmo',
            ],
            [
                'id' => 36,
                'name' => 'Vélez Sársfield',
            ],
            [
                'id' => 37,
                'name' => 'Versalles',
            ],
            [
                'id' => 38,
                'name' => 'Villa Crespo',
            ],
            [
                'id' => 39,
                'name' => 'Villa del Parque',

            ],
            [
                'id' => 40,
                'name' => 'Villa Devoto',
            ],
            [
                'id' => 41,
                'name' => 'Villa General Mitre',
            ],
            [
                'id' => 42,
                'name' => 'Villa Lugano',
            ],
            [
                'id' => 43,
                'name' => 'Barrio Norte',
            ],
            [
                'id' => 44,
                'name' => 'Cañitas',
            ],
            [
                'id' => 45,
                'name' => 'Villa Urquiza',
            ],
        ]);
        //
    }
}
