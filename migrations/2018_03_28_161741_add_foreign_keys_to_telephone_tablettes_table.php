<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTelephoneTablettesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('telephone_tablettes', function(Blueprint $table)
		{
			$table->foreign('id_categorie')->references('id')->on('categories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('telephone_tablettes', function(Blueprint $table)
		{
			$table->dropForeign('telephone_tablettes_id_categorie_foreign');
		});
	}

}
