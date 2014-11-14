<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnunciosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anuncios', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->nullable(false)->index();
			$table->string('titulo')->nullable(false);
			$table->integer('categoria_id')->nullable(false);
			$table->text('descripcion')->nullable(false);
			$valores = array('O', 'D');
			$table->enum('tipo', $valores)->nullable(false)->index();
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
		Schema::drop('anuncios');
	}

}
