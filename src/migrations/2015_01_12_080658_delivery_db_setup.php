<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeliveryDbSetup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery_supplier', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255)->unique();
			$table->rememberToken();
			$table->softDeletes();
			$table->timestamps();
		});
		
		Schema::create('delivery_batch', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('supplier_id');
			$table->foreign('supplier_id')->references('id')->on('delivery_supplier');
			$table->date('deliveryDate');
			$table->float('cost');
			$table->rememberToken();
			$table->softDeletes();
			$table->timestamps();
		});
		
		Schema::create('delivery_package', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('batch_id');
			$table->foreign('batch_id')->references('id')->on('delivery_batch');
			$table->dateTime('unpackingDateTime');
			$table->float('weight');
			$table->rememberToken();
			$table->softDeletes();
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
		Schema::drop('delivery_supplier');
		Schema::drop('delivery_batch');
		Schema::drop('delivery_package');
	}

}
