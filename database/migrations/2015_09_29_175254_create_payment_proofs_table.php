<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentProofsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_proofs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_id')->unsigned();
			$table->string('time');
			$table->string('date');
			$table->string('ref_no');
			$table->string('amount');
			$table->string('pref_bank');
			$table->string('method');
			$table->timestamps();

			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_proofs');
	}

}
