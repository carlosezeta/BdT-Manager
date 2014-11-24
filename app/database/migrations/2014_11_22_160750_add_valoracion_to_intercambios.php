<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddValoracionToIntercambios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('intercambios', function(Blueprint $table) {
			$table->integer('valoracion');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('intercambios', function(Blueprint $table) {
			$table->dropColumn('valoracion');
		});
	}

}
