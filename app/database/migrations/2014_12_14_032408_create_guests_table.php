<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            //Create guests table.
            Schema::create('guests', function($table) {
               $table->increments('id');
               $table->string('email')->unique();
               $table->string('name'); 
               $table->string('attending');
               $table->string('items');
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
            //Delete guests table.
            Schema::drop('guests');
	}

}
