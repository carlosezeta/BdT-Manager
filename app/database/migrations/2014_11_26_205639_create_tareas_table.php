<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTareasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tareas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('autor_id')->nullable(false)->unsigned();
			$table->string('titulo')->nullable(false);
			$table->string('descripcion');
			$table->integer('dificultad');
			$table->integer('tiempo');
			$table->integer('responsable_id');
			$table->integer('estado');
			$table->text('comentario');
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
		Schema::drop('tareas');
	}

}
