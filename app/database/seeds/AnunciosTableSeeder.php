<?php

class AnunciosTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('anuncios')->truncate();

		$user_id = 1;
		$anuncios = array(
				array(
                    'id'           => 1,
                    'user_id'    => $user_id,
                    'titulo'      => 'Ruso',
                    'categoria_id'       => 1,
                    'descripcion'    => 'Puedo ayudar en el estudio y la práctica de la lengua ruso.',
                    'tipo'       => 'O',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 2,
                    'user_id'    => $user_id,
                    'titulo'      => 'English',
                    'categoria_id'       => 2,
                    'descripcion'    => 'Do you want to chat? What do you want to talk about? I can help you to practice and improve your English.',
                    'tipo'       => 'O',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 3,
                    'user_id'    => 2,
                    'titulo'      => 'Boix grèbol',
                    'categoria_id'       => 3,
                    'descripcion'    => 'Tinc planta de grèbol',
                    'tipo'       => 'O',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 4,
                    'user_id'    => $user_id,
                    'titulo'      => "Assesorament en Disseny d'espais i posar ordre",
                    'categoria_id'       => 4,
                    'descripcion'    => "Tothom diu que se treure el major partit i que faig molt amb poc, que tinc molta capacitat visual i d'imaginar i organitzar espais. si estas pensant en fer canvis a la teva llar, et puc ajudar.",
                    'tipo'       => 'O',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 5,
                    'user_id'    => $user_id,
                    'titulo'      => "Clases d'Alemany Bàsic",
                    'categoria_id'       => 1,
                    'descripcion'    => "Estic buscant una persona nadiua alemana que m'ensenyi l'idioma.",
                    'tipo'       => 'D',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 6,
                    'user_id'    => 2,
                    'titulo'      => "Frances",
                    'categoria_id'       => 1,
                    'descripcion'    => "J'étudie français. Je voudraiis pratiquer mon français",
                    'tipo'       => 'D',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 7,
                    'user_id'    => $user_id,
                    'titulo'      => "castellana",
                    'categoria_id'       => 5,
                    'descripcion'    => "Estudio espanol. Quiero encontrar compañeros para la práctica de la lengua hablada",
                    'tipo'       => 'D',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 8,
                    'user_id'    => 2,
                    'titulo'      => "AdWords",
                    'categoria_id'       => 6,
                    'descripcion'    => "Necessito una persona que conegui i sàpiga gestionar l'Adwords i el posicionament de la pàpina web. Gràcies.",
                    'tipo'       => 'D',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 9,
                    'user_id'    => $user_id,
                    'titulo'      => "LLoc o ideas per festa aniversari nena de 6 anys",
                    'categoria_id'       => 7,
                    'descripcion'    => "Bon dia, necessito si algú em pot donar una idea o cedir un espai chulo, per celebrar una festa d'aniversari amb 9 nens de uns 6 anys, amb la meva filla ja som 10. més els papis i mamis.Al novembre es el seu aniversari però fa fred per fer-ho a un parc, i no em puc permetre pagar un lloc tancat d'aquets on fan festes. alguna idea? merci",
                    'tipo'       => 'D',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 10,
                    'user_id'    => 2,
                    'titulo'      => "Ajudar-me a buscar un pis de lloguer",
                    'categoria_id'       => 4,
                    'descripcion'    => "Busco un lloguer molt baratet per mi i la meva filla perquè ens doblaran el lloguer. Saps on puc trobar quelcom interesant? merci",
                    'tipo'       => 'D',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                ),
                array(
                    'id'           => 11,
                    'user_id'    => $user_id,
                    'titulo'      => "modista cosir",
                    'categoria_id'       => 4,
                    'descripcion'    => "necessito algu que sàpiga cosir per fer petits arranjaments e roba i en bolsos",
                    'tipo'       => 'D',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                )
		);

		// Uncomment the below to run the seeder
		DB::table('anuncios')->insert($anuncios);
	}

}
