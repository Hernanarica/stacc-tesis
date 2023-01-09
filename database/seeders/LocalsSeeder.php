<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
			  'id'           		=> 1,
			  'user_id'      		=> 1,
			  'neighborhood_id' 	=> 24,
			  'name'         		=> 'Campobravo',
			  'address'      		=> 'Honduras 5600',
			  'opening_time' 		=> '11h',
			  'closing_time' 		=> '23:30h',
			  'url_site'     		=> 'https://www.instagram.com/campobravoarg/',
			  'url_map'      		=> '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.783583830148!2d-58.438585984164284!3d-34.58434216398138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb58d96e9dad7%3A0xfa2b94eed574e1ea!2sHonduras%205600%2C%20C1414BND%20CABA!5e0!3m2!1ses-419!2sar!4v1637896401400!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
			  'phone'        		=> '1152482070',
			  'terms'        		=> 1,
			  'is_favorite'  		=> 0,
			  'image'        		=> 'campo_bravo.jpg',
			  'image_alt'    		=> 'Restaurant Campobravo Palermo',
			  'is_public'    		=> 1,
			  'created_at'   		=> date('Y-m-d'),
			  'updated_at'   		=> date('Y-m-d'),
		   ],
		   [
			  'id'           		=> 2,
			  'user_id'      		=> 1,
			  'neighborhood_id' 	=> 24,
			  'name'         		=> 'Sintaxis',
			  'address'      		=> 'Nicaragua 4849',
			  'opening_time' 		=> '10h',
			  'closing_time' 		=> '23:30h',
			  'url_site'     		=> 'www.sintaxisglutenfree.com',
			  'url_map'      		=> '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13138.828261320305!2d-58.4274652!3d-34.586278!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb0e5ebd5982a548a!2sSintaxis%20Palermo!5e0!3m2!1ses-419!2sar!4v1638229674081!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
			  'phone'        		=> '01120712960',
			  'terms'        		=> 1,
			  'is_favorite'  		=> 0,
			  'image'        		=> 'sintaxis-palermo.jpg',
			  'image_alt'    		=> 'Restaurant Sintaxis Palermo',
			  'is_public'    		=> 1,
			  'created_at'   		=> date('Y-m-d'),
			  'updated_at'   		=> date('Y-m-d'),
		   ],
		   [
			  'id'           		=> 3,
			  'user_id'      		=> 1,
			  'neighborhood_id' 	=> 43,
			  'name'         		=> 'Gout Gluten Free',
			  'address'      		=> 'Montevideo 1480',
			  'opening_time' 		=> '9h',
			  'closing_time' 		=> '20h',
			  'url_site'     		=> 'www.goutglutenfree.com.ar',
			  'url_map'      		=> '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105137.24338706768!2d-58.50141491090092!3d-34.56522949948272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccabc7af91789%3A0x1e7680518acb8259!2sGOUT%20GLUTEN%20FREE!5e0!3m2!1ses-419!2sar!4v1638231387925!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
			  'phone'        		=> '01148113701',
			  'terms'        		=> 1,
			  'is_favorite'  		=> 0,
			  'image'        		=> 'gout-barrionorte.jpg',
			  'image_alt'    		=> 'Restaurant Gout Gluten Free',
			  'is_public'    		=> 1,
			  'created_at'   		=> date('Y-m-d'),
			  'updated_at'   		=> date('Y-m-d'),
		   ],
		   [
			  'id'           		=> 4,
			  'user_id'      		=> 1,
			  'neighborhood_id' 	=> 24,
			  'name'         		=> 'Koh Lanta',
			  'address'      		=> 'Gorriti 4647',
			  'opening_time' 		=> '11:00h',
			  'closing_time' 		=> '23:30h',
			  'url_site'     		=> 'https://www.instagram.com/kohlantaresto/?hl=es',
			  'url_map'      		=> '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.4947459156215!2d-58.42991122347703!3d-34.59164895686231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca78151f6aef%3A0x8475ba2a74d41e0a!2sKoh%20Lanta!5e0!3m2!1ses!2sar!4v1673269146514!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
			  'phone'        		=> '1152262970',
			  'terms'        		=> 1,
			  'is_favorite'  		=> 0,
			  'image'        		=> 'koh-lanta.png',
			  'image_alt'    		=> 'Restaurant Koh Lanta',
			  'is_public'    		=> 1,
			  'created_at'   		=> date('Y-m-d'),
			  'updated_at'   		=> date('Y-m-d'),
		   ],
		    [
			    'id'           		=> 5,
			   	'user_id'      		=> 1,
			   	'neighborhood_id' 	=> 6,
			    'name'         		=> 'Jade Sin Tacc',
			    'address'      		=> 'Av. Monroe 2628',
			    'opening_time' 		=> '11h',
			    'closing_time' 		=> '20h',
			    'url_site'     		=> 'https://jade-sin-tacc.negocio.site',
			    'url_map'      		=> '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13143.030068774739!2d-58.4620652!3d-34.5596944!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xabf17ea3a53a334c!2sJade%20sin%20tacc!5e0!3m2!1ses-419!2sar!4v1638231890873!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
			    'phone'        		=> '01149663244',
			    'terms'        		=> 1,
			    'is_favorite'  		=> 0,
			    'image'        		=> 'jade.jpg',
			    'image_alt'    		=> 'Restaurant Jade Sin Tacc',
			    'is_public'    		=> 1,
			    'created_at'   		=> date('Y-m-d'),
			    'updated_at'   		=> date('Y-m-d'),
		    ],
		    [
			    'id'           		=> 6,
			   	'user_id'      		=> 1,
			   	'neighborhood_id' 	=> 30,
			    'name'         		=> 'Chila',
			    'address'      		=> 'Av. Alicia Moreau de Justo 1160',
			    'opening_time' 		=> '11h',
			    'closing_time' 		=> '20h',
			    'url_site'     		=> 'https://www.chilarestaurant.com/en/home/',
			    'url_map'      		=> '<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d52530.02394970238!2d-58.43207868765824!3d-34.62624349598567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d-34.6409174!2d-58.4287612!4m5!1s0x95a3352a1cbc33af%3A0x8663ae2be358730c!2schila%20restaurante!3m2!1d-34.610966!2d-58.366119999999995!5e0!3m2!1ses-419!2sar!4v1673272467055!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
			    'phone'        		=> '011 4343-6067',
			    'terms'        		=> 1,
			    'is_favorite'  		=> 0,
			    'image'        		=> 'chila.jpg',
			    'image_alt'    		=> 'Restaurant Chila',
			    'is_public'    		=> 1,
			    'created_at'   		=> date('Y-m-d'),
			    'updated_at'   		=> date('Y-m-d'),
		    ],
	    ]);
    }
}
