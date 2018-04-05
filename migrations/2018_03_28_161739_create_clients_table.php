<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 15);
			$table->string('phone', 15);
			$table->float('rating')->default(0.00);
			$table->string('email', 25);
			$table->string('src_image', 100);
			$table->string('password', 20);
			$table->integer('position')->default(0);
			$table->timestamps();
			$table->unique(['username','email','phone']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}
