<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveRememberToken extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('delivery_supplier', function($table){
			$table->dropColumn('remember_token');
		});
		Schema::table('delivery_batch', function($table){
			$table->dropColumn('remember_token');
		});
		Schema::table('delivery_package', function($table){
			$table->dropColumn('remember_token');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('delivery_supplier', function($table){
			$table->rememberToken()->nullable()->after('name');
		});
		Schema::table('delivery_batch', function($table){
			$table->rememberToken()->nullable()->after('cost');
		});
		Schema::table('delivery_package', function($table){
			$table->rememberToken()->nullable()->after('weight');
		});
	}

}
