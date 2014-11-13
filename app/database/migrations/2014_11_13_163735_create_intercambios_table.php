<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIntercambiosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intercambios', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('pagador_id')->unsgined()->nullable(false)->index();
			$table->integer('cobrador_id')->unsgined()->nullable(false)->index();
			$table->integer('categoria_id')->unsgined()->index();
			$table->text('descripcion');
			$table->float('horas')->nullable(false);
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
		Schema::drop('intercambios');
	}

}
