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
                'name' => 'CAMPOBRAVO',
                'street' => 'Pierina Sialessi',
                'street-number' => '340',
                'phone' => '541133860340',
                'neighborhood_id' => 29,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28651.54734676558!2d-58.39508165076559!3d-34.59915370306289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a335933e5086bd%3A0x3f97f772b4b7f7e2!2sCAMPOBRAVO!5e0!3m2!1ses-419!2sar!4v1709321297878!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'website' => 'https://campobravo-steakhouse.negocio.site/',
                'description' => 'Steakhouse & Cocina Internacional ',
                'cover-photo' => 'campo_bravo.jpg',
                'certificate' => 'campobravo_certificate.jpg',
                'social-networks' => json_encode([
                    'instagram' => 'https://www.instagram.com/campobravoarg/',
                ]),
                'schedules' => json_encode([
                    'monday' => [
                        'day' => 'monday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'tuesday' => [
                        'day' => 'tuesday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'wednesday' => [
                        'day' => 'wednesday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'thursday' => [
                        'day' => 'thursday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'friday' => [
                        'day' => 'friday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'saturday' => [
                        'day' => 'saturday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'sunday' => [
                        'day' => 'sunday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'name' => 'sintaxis',
                'street' => 'Nicaragua',
                'street-number' => '4849',
                'phone' => '01120712960',
                'neighborhood_id' => 24,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13138.828261320305!2d-58.4274652!3d-34.586278!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb0e5ebd5982a548a!2sSintaxis%20Palermo!5e0!3m2!1ses-419!2sar!4v1638229674081!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'website' => 'https://shop.sintaxisglutenfree.com/',
                'description' => 'Sintaxis es un restaurante de comida mexicana con más de 20 años de experiencia.',
                'cover-photo' => 'sintaxis-palermo.jpg',
                'certificate' => 'sintaxis_certificate.jpg',
                'social-networks' => json_encode([
                    'facebook' => 'https://www.facebook.com/lacasona',
                    'instagram' => 'https://www.instagram.com/sintaxisglutenfree',
                    'tiktok' => 'https://www.tiktok.com/lacasona',
                ]),
                'schedules' => json_encode([
                    'monday' => [
                        'day' => 'monday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'tuesday' => [
                        'day' => 'tuesday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'wednesday' => [
                        'day' => 'wednesday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'thursday' => [
                        'day' => 'thursday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'friday' => [
                        'day' => 'friday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'saturday' => [
                        'day' => 'saturday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'sunday' => [
                        'day' => 'sunday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'user_id' => 2,
                'name' => 'GOUT GLUTEN FREE',
                'street' => 'Montevideo',
                'street-number' => '1480',
                'phone' => '01148113701',
                'neighborhood_id' => 43,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105137.24338706768!2d-58.50141491090092!3d-34.56522949948272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccabc7af91789%3A0x1e7680518acb8259!2sGOUT%20GLUTEN%20FREE!5e0!3m2!1ses-419!2sar!4v1638231387925!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'website' => 'http://www.goutglutenfree.com.ar/',
                'description' => 'GOUT GLUTEN FREE es un lugar dedicado especialmente a la elaboración y venta de productos libres de gluten',
                'cover-photo' => 'gout-barrionorte.jpg',
                'certificate' => 'gout_certificate.jpg',
                'social-networks' => json_encode([
                    'facebook' => 'https://www.facebook.com/goutglutenfree?fref=ts',
                    'instagram' => 'https://www.instagram.com/goutglutenfree/',
                ]),
                'schedules' => json_encode([
                    'monday' => [
                        'day' => 'monday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'tuesday' => [
                        'day' => 'tuesday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'wednesday' => [
                        'day' => 'wednesday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'thursday' => [
                        'day' => 'thursday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'friday' => [
                        'day' => 'friday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'saturday' => [
                        'day' => 'saturday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'sunday' => [
                        'day' => 'sunday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'user_id' => 2,
                'name' => 'BUENOS AIRES VERDE',
                'street' => 'Gorriti',
                'street-number' => '5657',
                'phone' => '47759594',
                'neighborhood_id' => 24,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d53322.147593104964!2d-58.43726886025117!3d-34.57618863594581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb58d70ef8617%3A0x7fda5067acd45136!2sBuenos+Aires+Verde!5e0!3m2!1ses!2sar!4v1557697751530!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                'website' => 'https://www.bsasverde.com',
                'description' => 'Buenos Aires Verde te invita a descubrir el concepto de “alimentación inteligente” con propuestas vegetarianas, veganas y raw, orgánicas o libres de agroquímicos. Vení a sorprenderte y reencontrarte.',
                'cover-photo' => 'buenos-aires-verde.png',
                'certificate' => 'bav-certificate.jpg',
                'social-networks' => json_encode([
                    'facebook' => 'https://www.facebook.com/buenos.aires.verde.restaurant/',
                    'instagram' => 'https://www.instagram.com/buenosairesverde',
                ]),
                'schedules' => json_encode([
                    'monday' => [
                        'day' => 'monday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'tuesday' => [
                        'day' => 'tuesday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'wednesday' => [
                        'day' => 'wednesday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'thursday' => [
                        'day' => 'thursday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'friday' => [
                        'day' => 'friday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'saturday' => [
                        'day' => 'saturday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'sunday' => [
                        'day' => 'sunday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'name' => 'Jade sin tacc',
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
                    'instagram' => 'https://www.instagram.com/jade.sintacc',
                ]),
                'schedules' => json_encode([
                    'monday' => [
                        'day' => 'monday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'tuesday' => [
                        'day' => 'tuesday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'wednesday' => [
                        'day' => 'wednesday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'thursday' => [
                        'day' => 'thursday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'friday' => [
                        'day' => 'friday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'saturday' => [
                        'day' => 'saturday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'sunday' => [
                        'day' => 'sunday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'user_id' => 1,
                'name' => 'COCELIA',
                'street' => 'Av. Alicia Moreau de Justo',
                'street-number' => '1160',
                'phone' => '01143436067',
                'neighborhood_id' => 29,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13134.53747424774!2d-58.4379851!3d-34.6134061!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca6a9cbac705%3A0xb02afc8219d96495!2sCocelia%20%7C%20Caballito!5e0!3m2!1ses-419!2sar!4v1709507007555!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'website' => 'https://www.cocelia.com.ar/',
                'description' => 'Cocelia propone productos de alta calidad para personas que deseen o necesiten una dieta saludable y cuidada.

Nos dedicamos a desarrollar, fabricar y vender panificados salados y productos de pastelería recién horneados, todos apto celíacos, con óptimas características nutricionales, sensoriales y funcionales.',
                'cover-photo' => 'cocelia.png',
                'certificate' => 'cocelia-certificate.jpg',
                'social-networks' => json_encode([
                    'facebook' => 'https://www.facebook.com/Cocelia1/',
                    'instagram' => 'https://www.instagram.com/cocelia.bakery/',
                ]),
                'schedules' => json_encode([
                    'monday' => [
                        'day' => 'monday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'tuesday' => [
                        'day' => 'tuesday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'wednesday' => [
                        'day' => 'wednesday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'thursday' => [
                        'day' => 'thursday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'friday' => [
                        'day' => 'friday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'saturday' => [
                        'day' => 'saturday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'sunday' => [
                        'day' => 'sunday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'user_id' => 1,
                'name' => 'Aaramburu',
                'street' => 'Vicente López',
                'street-number' => '1661 Local 12',
                'phone' => '01148135900',
                'neighborhood_id' => 29,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.4905378179205!2d-58.3892206!3d-34.5917554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb2880680853%3A0x4371ba29c405366b!2sAramburu%20Relais%20%26%20Ch%C3%A2teaux!5e0!3m2!1ses-419!2sar!4v1709507228701!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'website' => 'https://www.arambururesto.com.ar/',
                'description' => 'Desde 2007, el chef Gonzalo Aramburu lidera
                  esta experiencia gastronómica que evoluciona en cada paso.
                  con el reto constante de lograr lo mejor
                  expresión de cada producto de temporada y cuidado absoluto
                  del equilibrio entre sabroso, textura y presentación.',
                'cover-photo' => 'aramburu.jpg',
                'certificate' => 'aramburu-certificate.jpg',
                'social-networks' => json_encode([
                    'instagram' => 'https://www.instagram.com/arambururesto/',
                ]),
                'schedules' => json_encode([
                    'monday' => [
                        'day' => 'monday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'tuesday' => [
                        'day' => 'tuesday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'wednesday' => [
                        'day' => 'wednesday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'thursday' => [
                        'day' => 'thursday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'friday' => [
                        'day' => 'friday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'saturday' => [
                        'day' => 'saturday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'sunday' => [
                        'day' => 'sunday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'user_id' => 1,
                'name' => 'CUCHINA PARADISO',
                'street' => 'José Andrés Pacheco de Melo',
                'street-number' => '1865',
                'phone' => '1166313678',
                'neighborhood_id' => 30,
                'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26275.877242263523!2d-58.41136601836161!3d-34.59190419727207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccb632d6c3ff5%3A0xa5ce0ffb7195cfa6!2sCucina%20Paradiso%20Recoleta!5e0!3m2!1ses-419!2sar!4v1709507869734!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'website' => 'https://www.cucinaparadiso.com/',
                'description' => 'Cucina Paradiso es un restaurante de comida italiana con más de 20 años de experiencia.',
                'cover-photo' => 'cuchina-aradiso.jpg',
                'certificate' => 'cuchina-aradiso-certificate.jpg',
                'social-networks' => json_encode([
                    'facebook' => 'https://www.facebook.com/CUCINAPARADISOBUENOSAIRES',
                    'instagram' => 'https://www.instagram.com/cucinaparadisoba/',

                ]),
                'schedules' => json_encode([
                    'monday' => [
                        'day' => 'monday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'tuesday' => [
                        'day' => 'tuesday',
                        'opening-time' => '8:00',
                        'closing-time' => '13:00',
                    ],
                    'wednesday' => [
                        'day' => 'wednesday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'thursday' => [
                        'day' => 'thursday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'friday' => [
                        'day' => 'friday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'saturday' => [
                        'day' => 'saturday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                    'sunday' => [
                        'day' => 'sunday',
                        'opening-time' => '8:00',
                        'closing-time' => '20:00',
                    ],
                ]),
                'terms' => 1,
                'is_favorite' => 1,
                'is_public' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
