<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVettementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vettements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 20);
			$table->string('description');
			$table->string('marque', 25);
			$table->float('prix', 10, 0);
			$table->string('color', 15);
			$table->string('h_f', 10);
			$table->string('age', 20);
			$table->string('taille', 8);
			$table->timestamps();
			$table->integer('id_categorie')->unsigned()->index('vettements_id_categorie_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vettements');
	}

}
