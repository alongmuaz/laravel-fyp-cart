<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->string('title');
			$table->string('slug');
			$table->string('info');
			$table->text('description');
			$table->decimal('price',6,2);
			$table->boolean('status')->default(1);
			$table->boolean('type')->default(0);
			$table->string('image');
			$table->string('profit');
			$table->timestamps();

			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
