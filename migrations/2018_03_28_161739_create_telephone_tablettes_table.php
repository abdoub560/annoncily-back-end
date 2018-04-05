<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelephoneTablettesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('telephone_tablettes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 20);
			$table->string('description');
			$table->string('marque', 25);
			$table->float('prix', 10, 0);
			$table->string('color', 15);
			$table->float('ram');
			$table->float('cam_avant');
			$table->float('cam_arriere');
			$table->string('cpu', 15);
			$table->float('rom');
			$table->integer('id_categorie')->unsigned()->index('telephone_tablettes_id_categorie_foreign');
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
		Schema::drop('telephone_tablettes');
	}

}
