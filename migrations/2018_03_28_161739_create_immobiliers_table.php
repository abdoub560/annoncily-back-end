<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImmobiliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('immobiliers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 20);
			$table->string('description');
			$table->float('prix', 10, 0);
			$table->string('adresse');
			$table->string('surface', 100);
			$table->boolean('v_l');
			$table->integer('id_categorie')->unsigned()->index('immobiliers_id_categorie_foreign');
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
		Schema::drop('immobiliers');
	}

}
