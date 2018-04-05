<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnnoncesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('annonces', function(Blueprint $table)
		{
			$table->foreign('id_client')->references('id')->on('clients')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('annonces', function(Blueprint $table)
		{
			$table->dropForeign('annonces_id_client_foreign');
		});
	}

}
