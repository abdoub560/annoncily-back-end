<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('id_client')->unsigned()->index('favories_id_client_foreign');
			$table->integer('id_annonce')->unsigned()->index('favories_id_annonce_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('favories');
	}

}
