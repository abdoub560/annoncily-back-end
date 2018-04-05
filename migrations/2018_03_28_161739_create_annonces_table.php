<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnoncesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('annonces', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('position')->default(0);
			$table->integer('categorie');
			$table->timestamps();
			$table->integer('id_client')->unsigned()->index('annonces_id_client_foreign');
			$table->integer('id_produit');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('annonces');
	}

}
