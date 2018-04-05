<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commentaires', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('body');
			$table->timestamps();
			$table->integer('id_client')->unsigned()->index('commentaires_id_client_foreign');
			$table->integer('id_annonce')->unsigned()->index('commentaires_id_annonce_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('commentaires');
	}

}
