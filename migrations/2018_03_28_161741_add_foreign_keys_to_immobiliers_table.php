<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToImmobiliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('immobiliers', function(Blueprint $table)
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
		Schema::table('immobiliers', function(Blueprint $table)
		{
			$table->dropForeign('immobiliers_id_categorie_foreign');
		});
	}

}
