<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommentairesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commentaires', function(Blueprint $table)
		{
			$table->foreign('id_annonce')->references('id')->on('annonces')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('commentaires', function(Blueprint $table)
		{
			$table->dropForeign('commentaires_id_annonce_foreign');
			$table->dropForeign('commentaires_id_client_foreign');
		});
	}

}
