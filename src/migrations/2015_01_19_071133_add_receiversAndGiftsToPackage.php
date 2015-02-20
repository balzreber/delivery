<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReceiversAndGiftsToPackage extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('delivery_package', function($table)
		{
			$table->integer('recepients')->after('weight');
			$table->boolean('gift')->default(false)->after('recepients');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('delivery_package', function($table){
			$table->dropColumn('recepients');
			$table->dropColumn('gift');
		});
	}

}

?>