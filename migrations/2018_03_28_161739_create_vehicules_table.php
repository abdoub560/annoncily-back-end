<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiculesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vehicules', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 20);
			$table->string('description');
			$table->float('vitesse', 10, 0);
			$table->float('poids');
			$table->string('marque', 25);
			$table->dateTime('date_fabrication');
			$table->string('color', 15);
			$table->float('prix', 10, 0);
			$table->integer('id_categorie')->unsigned()->index('vehicules_id_categorie_foreign');
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
		Schema::drop('vehicules');
	}

}
