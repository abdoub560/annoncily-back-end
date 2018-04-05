<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVettementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vettements', function(Blueprint $table)
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
		Schema::table('vettements', function(Blueprint $table)
		{
			$table->dropForeign('vettements_id_categorie_foreign');
		});
	}

}
