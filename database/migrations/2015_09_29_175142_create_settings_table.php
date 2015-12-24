<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('about_title');
			$table->text('about');
			$table->string('site_title');
			$table->string('site_keyword');
			$table->string('site_description');
			$table->string('address');
			$table->string('company_name');
			$table->string('company_regno');
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
		Schema::drop('settings');
	}

}
