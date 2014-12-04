<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Create parties table.
            Schema::create('parties', function($table) {
               $table->increments('id');
               $table->integer('user_id');
               $table->string('website')->unique();
               $table->string('name');
               $table->date('date');
               $table->time('time');
               $table->string('theme');
               $table->text('provided_items'); 
               $table->string('location');
               $table->string('attire');
               $table->string('alcohol');
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
		//Delete parties table.
            Schema::drop('parties');
	}

}
