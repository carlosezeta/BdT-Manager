<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RenameDescripcionFromCategorias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categorias', function(Blueprint $table) {
			$table->renameColumn('descripcion', 'extracto');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categorias', function(Blueprint $table) {
			$table->renameColumn('extracto', 'descripcion');
		});
	}

}
