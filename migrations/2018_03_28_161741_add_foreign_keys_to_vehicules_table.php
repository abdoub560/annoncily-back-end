<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehiculesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicules', function(Blueprint $table)
		{
			$table->foreign('id_categorie')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicules', function(Blueprint $table)
		{
			$table->dropForeign('vehicules_id_categorie_foreign');
		});
	}

}
