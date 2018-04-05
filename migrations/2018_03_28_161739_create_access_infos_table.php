<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccessInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('access_infos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type', 20);
			$table->string('description');
			$table->string('marque', 25);
			$table->float('prix', 10, 0);
			$table->string('color', 15);
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
		Schema::drop('access_infos');
	}

}
