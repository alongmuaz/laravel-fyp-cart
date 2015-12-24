<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('customer_id')->unsigned();
			$table->string('order_date');
			$table->string('total_tax');
			$table->string('total_purchase');
			$table->string('order_status');
			$table->timestamps();

			$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
