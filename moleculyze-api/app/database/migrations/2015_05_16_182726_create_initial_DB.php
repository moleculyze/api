<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInitialDB extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feedstock', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->decimal('fiber_percentage_low');
			$table->decimal('fiber_percentage_high');
			$table->timestamps();
		});

		Schema::create('enzyme', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->decimal('temp_low');
			$table->decimal('temp_high');
			$table->decimal('rate_low');
			$table->decimal('rate_high');
			$table->timestamps();
		});

		Schema::create('experiment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('feedstock_id')->unsigned();
			$table->decimal('fiber_percentage');
			$table->integer('starch_percentage');
			$table->integer('enzyme1_id')->unsigned();
			$table->decimal('enzyme1_temp');
			$table->decimal('enzyme1_rate');
			$table->integer('enzyme2_id')->unsigned();
			$table->decimal('enzyme2_temp');
			$table->decimal('enzyme2_rate');
			$table->integer('enzyme3_id')->unsigned();
			$table->decimal('enzyme3_temp');
			$table->decimal('enzyme3_rate');
			$table->integer('enzyme4_id')->unsigned();
			$table->decimal('enzyme4_temp');
			$table->decimal('enzyme4_rate');
			$table->integer('yeastbacteria_id')->unsigned();
			$table->decimal('yeastbacteria_temp');
			$table->decimal('yeastbacteria_rate');
			$table->integer('yield_amount');
			$table->integer('co2_amount');
			$table->integer('energy_cost');
			$table->integer('score');
			$table->timestamps();

			$table->foreign('feedstock_id')->references('id')->on('feedstock');
			$table->foreign('enzyme1_id')->references('id')->on('enzyme');
			$table->foreign('enzyme2_id')->references('id')->on('enzyme');
			$table->foreign('enzyme3_id')->references('id')->on('enzyme');
			$table->foreign('enzyme4_id')->references('id')->on('enzyme');
			$table->foreign('yeastbacteria_id')->references('id')->on('enzyme');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expiriment');
		Schema::drop('enzyme');
		Schema::drop('feedstock');
	}

}
