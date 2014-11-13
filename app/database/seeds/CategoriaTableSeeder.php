<?php

class CategoriaTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('categorias')->truncate();

		$categorias = array(
			array(
                'id'        => 1,
                'nombre'    => 'Ensenyament',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'id'        => 2,
                'nombre'    => 'Ensenyament Llengua Anglesa',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'id'        => 3,
                'nombre'    => 'Treballs de jardineria',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'id'        => 4,
                'nombre'    => 'Treballs de la llar',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'id'        => 5,
                'nombre'    => 'Ensenyament Llengua Castellana',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'id'        => 6,
                'nombre'    => 'Informática',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'id'        => 7,
                'nombre'    => 'Lleure',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
		);

		// Uncomment the below to run the seeder
		DB::table('categorias')->insert($categorias);
	}

}
