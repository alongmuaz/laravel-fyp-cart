<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('order_id')->unsigned();
			$table->integer('gambar_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->string('form_id');
			$table->string('qty');
			$table->string('total_price');
			$table->string('color');
			$table->string('size');

			$table->timestamps();

			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('gambar_id')->references('id')->on('gambars')->onDelete('cascade');
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
		Schema::drop('transactions');
	}

}
