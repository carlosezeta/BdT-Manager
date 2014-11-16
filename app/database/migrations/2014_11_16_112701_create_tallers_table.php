<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTallersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tallers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('titulo')->nullable(false);
			$table->text('descripcion');
			$table->boolean('esgrupo');
			$table->string('textorepeticion');
			$table->date('fecha');
			$table->time('hora_inicio');
			$table->time('hora_fin');
			$table->string('lugar');
			$table->string('img');
			$table->integer('tallerista_id')->unsigned();
			$table->integer('plazas');
			$table->boolean('publicado');
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
		Schema::drop('tallers');
	}

}
