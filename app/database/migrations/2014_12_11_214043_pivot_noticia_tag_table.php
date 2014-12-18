<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotNoticiaTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('noticia_tag', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('noticia_id')->unsigned()->index();
			$table->integer('tag_id')->unsigned()->index();
			$table->foreign('noticia_id')->references('id')->on('noticias')->onDelete('cascade');
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('noticia_tag');
	}

}
