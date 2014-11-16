<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropuestasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('propuestas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tallerista_id');
			$table->string('titulo');
			$table->text('descripcion');
			$table->string('duracion');
			$table->string('horario');
			$table->integer('min_asistentes');
			$table->integer('max_asistentes');
			$table->text('espacio');
			$table->text('material_alumnos');
			$table->text('material_bdt');
			$table->boolean('oyentes');
			$table->binary('img');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('propuestas');
	}

}
