<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotTallerUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taller_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('taller_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('taller_id')->references('id')->on('tallers')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taller_user');
	}

}
