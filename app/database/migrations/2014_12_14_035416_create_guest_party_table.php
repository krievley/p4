<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestPartyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            //Create pivot table for guests and users.
            Schema::create('guest_party', function($table) {
                $table->integer('guest_id')->unsigned();
                $table->integer('party_id')->unsigned();

                # Define foreign keys...
                $table->foreign('guest_id')->references('id')->on('guests');
                $table->foreign('party_id')->references('id')->on('parties');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            //Drop the pivot table
            Schema::drop('guest_party');
	}

}
