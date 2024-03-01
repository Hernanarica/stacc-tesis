<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locals')->insert([
            [
                'id' => 1,
                'user_id' => 2,
                'name' => 'Campobravo',
                'street' => 'Honduras',
                'street-number' => '5600',
                'phone' => '1152482070',
                'neighborhood_id' => 1,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.073394073073!2d-99.1680736850906!3d19.41307378689968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff3f3f3f3f3f%3A0x3f3f3f3f3f3f3f3f!2sLa%20Casona!5e0!3m2!1ses-419!2smx!4v1637110730003!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'website' => 'https://www.lacasona.com',
                'description' => 'La Casona es un restaurante de comida mexicana con más de 20 años de experiencia.',
                'cover-photo' => 'campo_bravo.jpg',
                'certificate' => 'campo_bravo_certificate.jpg',
                'social-networks' => json_encode([
                    'facebook' => 'https://www.facebook.com/lacasona',
                    'instagram' => 'https://www.instagram.com/lacasona',
                    'tiktok' => 'https://www.tiktok.com/lacasona'
                ]),
                'schedules' => json_encode([
                    'lunes' => [
                        'day' => 'lunes',
                        'monday-opening-time' => '8:00',
                        'monday-closing-time' => '13:00',
                    ],
                    'martes' => [
                        'day' => 'martes',
                        'tuesday-opening-time' => '8:00',
                        'tuesday-closing-time' => '13:00',
                    ],
                    'miercoles' => [
                        'day' => 'miercoles',
                        'wednesday-opening-time' => '8:00',
                        'wednesday-closing-time' => '20:00',
                    ],
                    'jueves' => [
                        'day' => 'jueves',
                        'thursday-opening-time' => '8:00',
                        'thursday-closing-time' => '20:00',
                    ],
                    'viernes' => [
                        'day' => 'viernes',
                        'friday-opening-time' => '8:00',
                        'friday-closing-time' => '20:00',
                    ],
                    'sabado' => [
                        'day' => 'sabado',
                        'saturday-opening-time' => '8:00',
                        'saturday-closing-time' => '20:00',
                    ],
                    'domingo' => [
                        'day' => 'domingo',
                        'sunday-opening-time' => '8:00',
                        'sunday-closing-time' => '20:00',
                    ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'name' => 'Sintaxis',
                'street' => 'Nicaragua',
                'street-number' => '4849',
                'phone' => '01120712960',
                'neighborhood_id' => 24,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13138.828261320305!2d-58.4274652!3d-34.586278!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb0e5ebd5982a548a!2sSintaxis%20Palermo!5e0!3m2!1ses-419!2sar!4v1638229674081!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'website' => 'https://www.sintaxis.com',
                'description' => 'Sintaxis es un restaurante de comida mexicana con más de 20 años de experiencia.',
                'cover-photo' => 'sintaxis-palermo.jpg',
                'certificate' => 'sintaxis_certificate.jpg',
                'social-networks' => json_encode([
                    'facebook' => 'https://www.facebook.com/lacasona',
                    'instagram' => 'https://www.instagram.com/lacasona',
                    'tiktok' => 'https://www.tiktok.com/lacasona'
                ]),
                'schedules' => json_encode([
                  'lunes' => [
                    'day' => 'lunes',
                    'monday-opening-time' => '8:00',
                    'monday-closing-time' => '13:00',
                  ],
                  'martes' => [
                    'day' => 'martes',
                    'tuesday-opening-time' => '8:00',
                    'tuesday-closing-time' => '13:00',
                  ],
                  'miercoles' => [
                    'day' => 'miercoles',
                    'wednesday-opening-time' => '8:00',
                    'wednesday-closing-time' => '20:00',
                  ],
                  'jueves' => [
                    'day' => 'jueves',
                    'thursday-opening-time' => '8:00',
                    'thursday-closing-time' => '20:00',
                  ],
                  'viernes' => [
                    'day' => 'viernes',
                    'friday-opening-time' => '8:00',
                    'friday-closing-time' => '20:00',
                  ],
                  'sabado' => [
                    'day' => 'sabado',
                    'saturday-opening-time' => '8:00',
                    'saturday-closing-time' => '20:00',
                  ],
                  'domingo' => [
                    'day' => 'domingo',
                    'sunday-opening-time' => '8:00',
                    'sunday-closing-time' => '20:00',
                  ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'name' => 'Gout Gluten Free',
                'street' => 'Montevideo',
                'street-number' => '1480',
                'phone' => '01148113701',
                'neighborhood_id' => 43,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105137.24338706768!2d-58.50141491090092!3d-34.56522949948272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccabc7af91789%3A0x1e7680518acb8259!2sGOUT%20GLUTEN%20FREE!5e0!3m2!1ses-419!2sar!4v1638231387925!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'website' => 'www.goutglutenfree.com.ar',
                'description' => 'Gout Gluten Free es un restaurante de comida con más de 10 años de experiencia.',
                'cover-photo' => 'gout-barrionorte.jpg',
                'certificate' => 'gout_certificate.jpg',
                'social-networks' => json_encode([
                    'facebook' => 'https://www.facebook.com/lacasona',
                    'instagram' => 'https://www.instagram.com/lacasona',
                    'tiktok' => 'https://www.tiktok.com/lacasona'
                ]),
                'schedules' => json_encode([
                  'lunes' => [
                    'day' => 'lunes',
                    'monday-opening-time' => '8:00',
                    'monday-closing-time' => '13:00',
                  ],
                  'martes' => [
                    'day' => 'martes',
                    'tuesday-opening-time' => '8:00',
                    'tuesday-closing-time' => '13:00',
                  ],
                  'miercoles' => [
                    'day' => 'miercoles',
                    'wednesday-opening-time' => '8:00',
                    'wednesday-closing-time' => '20:00',
                  ],
                  'jueves' => [
                    'day' => 'jueves',
                    'thursday-opening-time' => '8:00',
                    'thursday-closing-time' => '20:00',
                  ],
                  'viernes' => [
                    'day' => 'viernes',
                    'friday-opening-time' => '8:00',
                    'friday-closing-time' => '20:00',
                  ],
                  'sabado' => [
                    'day' => 'sabado',
                    'saturday-opening-time' => '8:00',
                    'saturday-closing-time' => '20:00',
                  ],
                  'domingo' => [
                    'day' => 'domingo',
                    'sunday-opening-time' => '8:00',
                    'sunday-closing-time' => '20:00',
                  ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'user_id' => 2,
                'name' => 'Buenos Aires Verde',
                'street' => 'Gorriti',
                'street-number' => '5657',
                'phone' => '4775-9594',
                'neighborhood_id' => 24,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53322.147593104964!2d-58.43726886025117!3d-34.57618863594581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb58d70ef8617%3A0x7fda5067acd45136!2sBuenos+Aires+Verde!5e0!3m2!1ses!2sar!4v1557697751530!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'website' => 'www.bsasverde.com',
                'description' => 'Buenos Aires Verde es un espacio de encuentros y experiencias. Acerquémonos.',
                'cover-photo' => 'buenos-aires-verde.png',
                'certificate' => 'bav-certificate.jpg',
                'social-networks' => json_encode([
                    'instagram' => 'https://www.instagram.com/buenosairesverde',
                ]),
                'schedules' => json_encode([
                  'lunes' => [
                    'day' => 'lunes',
                    'monday-opening-time' => '8:00',
                    'monday-closing-time' => '13:00',
                  ],
                  'martes' => [
                    'day' => 'martes',
                    'tuesday-opening-time' => '8:00',
                    'tuesday-closing-time' => '13:00',
                  ],
                  'miercoles' => [
                    'day' => 'miercoles',
                    'wednesday-opening-time' => '8:00',
                    'wednesday-closing-time' => '20:00',
                  ],
                  'jueves' => [
                    'day' => 'jueves',
                    'thursday-opening-time' => '8:00',
                    'thursday-closing-time' => '20:00',
                  ],
                  'viernes' => [
                    'day' => 'viernes',
                    'friday-opening-time' => '8:00',
                    'friday-closing-time' => '20:00',
                  ],
                  'sabado' => [
                    'day' => 'sabado',
                    'saturday-opening-time' => '8:00',
                    'saturday-closing-time' => '20:00',
                  ],
                  'domingo' => [
                    'day' => 'domingo',
                    'sunday-opening-time' => '8:00',
                    'sunday-closing-time' => '20:00',
                  ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'name' => 'Jade Sin Tacc',
                'street' => 'Av. Monroe',
                'street-number' => '2628',
                'phone' => '01149663244',
                'neighborhood_id' => 6,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13143.030068774739!2d-58.4620652!3d-34.5596944!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xabf17ea3a53a334c!2sJade%20sin%20tacc!5e0!3m2!1ses-419!2sar!4v1638231890873!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'website' => 'https://jade-sin-tacc.negocio.site',
                'description' => 'Jade sin Tacc es un espacio de encuentros y experiencias.',
                'cover-photo' => 'jade.jpg',
                'certificate' => 'jade-certificate.jpg',
                'social-networks' => json_encode([
                    'instagram' => 'https://www.instagram.com/jade.sintacc/',
                ]),
                'schedules' => json_encode([
                  'lunes' => [
                    'day' => 'lunes',
                    'monday-opening-time' => '8:00',
                    'monday-closing-time' => '13:00',
                  ],
                  'martes' => [
                    'day' => 'martes',
                    'tuesday-opening-time' => '8:00',
                    'tuesday-closing-time' => '13:00',
                  ],
                  'miercoles' => [
                    'day' => 'miercoles',
                    'wednesday-opening-time' => '8:00',
                    'wednesday-closing-time' => '20:00',
                  ],
                  'jueves' => [
                    'day' => 'jueves',
                    'thursday-opening-time' => '8:00',
                    'thursday-closing-time' => '20:00',
                  ],
                  'viernes' => [
                    'day' => 'viernes',
                    'friday-opening-time' => '8:00',
                    'friday-closing-time' => '20:00',
                  ],
                  'sabado' => [
                    'day' => 'sabado',
                    'saturday-opening-time' => '8:00',
                    'saturday-closing-time' => '20:00',
                  ],
                  'domingo' => [
                    'day' => 'domingo',
                    'sunday-opening-time' => '8:00',
                    'sunday-closing-time' => '20:00',
                  ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'user_id' => 1,
                'name' => 'Chila',
                'street' => 'Av. Alicia Moreau de Justo',
                'street-number' => '1160',
                'phone' => '011 4343-6067',
                'neighborhood_id' => 29,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.7310605966854!2d-58.368694923476255!3d-34.61096155788202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a3352a1cbc33af%3A0x8663ae2be358730c!2sCHILA!5e0!3m2!1ses!2sar!4v1673283207733!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'website' => 'https://www.chilarestaurant.com/en/home/',
                'description' => 'Chila es un restaurante de comida con más de 15 años de experiencia.',
                'cover-photo' => 'chila.jpg',
                'certificate' => 'chila-certificate.jpg',
                'social-networks' => json_encode([
                    'instagram' => 'https://www.instagram.com/',
                ]),
                'schedules' => json_encode([
                  'lunes' => [
                    'day' => 'lunes',
                    'monday-opening-time' => '8:00',
                    'monday-closing-time' => '13:00',
                  ],
                  'martes' => [
                    'day' => 'martes',
                    'tuesday-opening-time' => '8:00',
                    'tuesday-closing-time' => '13:00',
                  ],
                  'miercoles' => [
                    'day' => 'miercoles',
                    'wednesday-opening-time' => '8:00',
                    'wednesday-closing-time' => '20:00',
                  ],
                  'jueves' => [
                    'day' => 'jueves',
                    'thursday-opening-time' => '8:00',
                    'thursday-closing-time' => '20:00',
                  ],
                  'viernes' => [
                    'day' => 'viernes',
                    'friday-opening-time' => '8:00',
                    'friday-closing-time' => '20:00',
                  ],
                  'sabado' => [
                    'day' => 'sabado',
                    'saturday-opening-time' => '8:00',
                    'saturday-closing-time' => '20:00',
                  ],
                  'domingo' => [
                    'day' => 'domingo',
                    'sunday-opening-time' => '8:00',
                    'sunday-closing-time' => '20:00',
                  ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'user_id' => 1,
                'name' => 'Buono',
                'street' => 'San Martín',
                'street-number' => '1275',
                'phone' => '01143189264',
                'neighborhood_id' => 29,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7163.370489328891!2d-58.371316392965326!3d-34.59354508861049!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4990804078d50dbb!2sBuono!5e0!3m2!1ses-419!2sar!4v1673273433914!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'website' => 'https://www.chilarestaurant.com/en/home/',
                'description' => 'Buono es una versión moderna de la cocina italiana, con una propuesta de platos clásicos y otros más innovadores.',
                'cover-photo' => 'buono.jpg',
                'certificate' => 'chila-certificate.jpg',
                'social-networks' => json_encode([
                    'instagram' => 'https://www.instagram.com/buono.italiankitchen/',
                ]),
                'schedules' => json_encode([
                  'lunes' => [
                    'day' => 'lunes',
                    'monday-opening-time' => '8:00',
                    'monday-closing-time' => '13:00',
                  ],
                  'martes' => [
                    'day' => 'martes',
                    'tuesday-opening-time' => '8:00',
                    'tuesday-closing-time' => '13:00',
                  ],
                  'miercoles' => [
                    'day' => 'miercoles',
                    'wednesday-opening-time' => '8:00',
                    'wednesday-closing-time' => '20:00',
                  ],
                  'jueves' => [
                    'day' => 'jueves',
                    'thursday-opening-time' => '8:00',
                    'thursday-closing-time' => '20:00',
                  ],
                  'viernes' => [
                    'day' => 'viernes',
                    'friday-opening-time' => '8:00',
                    'friday-closing-time' => '20:00',
                  ],
                  'sabado' => [
                    'day' => 'sabado',
                    'saturday-opening-time' => '8:00',
                    'saturday-closing-time' => '20:00',
                  ],
                  'domingo' => [
                    'day' => 'domingo',
                    'sunday-opening-time' => '8:00',
                    'sunday-closing-time' => '20:00',
                  ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'user_id' => 1,
                'name' => 'Aaramburu',
                'street' => 'Vicente López',
                'street-number' => '1661 Local 12',
                'phone' => '01148135900',
                'neighborhood_id' => 29,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.4804961965033!2d-58.389583!3d-34.592009399999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccabc863291c5%3A0x46c74ef2ed9274ed!2sPasaje%20Del%20Correo!5e0!3m2!1ses-419!2sar!4v1673273713826!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'website' => 'https://www.arambururesto.com.ar/',
                'description' => 'Buono es una versión moderna de la cocina italiana, con una propuesta de platos clásicos y otros más innovadores.',
                'cover-photo' => 'aramburu.jpg',
                'certificate' => 'aramburu-certificate.jpg',
                'social-networks' => json_encode([
                    'instagram' => 'https://www.instagram.com/arambururesto/',
                ]),
                'schedules' => json_encode([
                  'lunes' => [
                    'day' => 'lunes',
                    'monday-opening-time' => '8:00',
                    'monday-closing-time' => '13:00',
                  ],
                  'martes' => [
                    'day' => 'martes',
                    'tuesday-opening-time' => '8:00',
                    'tuesday-closing-time' => '13:00',
                  ],
                  'miercoles' => [
                    'day' => 'miercoles',
                    'wednesday-opening-time' => '8:00',
                    'wednesday-closing-time' => '20:00',
                  ],
                  'jueves' => [
                    'day' => 'jueves',
                    'thursday-opening-time' => '8:00',
                    'thursday-closing-time' => '20:00',
                  ],
                  'viernes' => [
                    'day' => 'viernes',
                    'friday-opening-time' => '8:00',
                    'friday-closing-time' => '20:00',
                  ],
                  'sabado' => [
                    'day' => 'sabado',
                    'saturday-opening-time' => '8:00',
                    'saturday-closing-time' => '20:00',
                  ],
                  'domingo' => [
                    'day' => 'domingo',
                    'sunday-opening-time' => '8:00',
                    'sunday-closing-time' => '20:00',
                  ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
