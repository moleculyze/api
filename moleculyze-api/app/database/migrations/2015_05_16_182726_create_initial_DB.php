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
		Schema::create('experiment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('fiber_percentage')->nullable();
			$table->integer('starch_percentage')->nullable();
			$table->decimal('enzyme1_temp')->nullable();
			$table->decimal('enzyme1_rate')->nullable();
			$table->decimal('enzyme2_temp')->nullable();
			$table->decimal('enzyme2_rate')->nullable();
			$table->decimal('enzyme3_temp')->nullable();
			$table->decimal('enzyme3_rate')->nullable();
			$table->decimal('enzyme4_temp')->nullable();
			$table->decimal('enzyme4_rate')->nullable();
			$table->decimal('yeast_temp')->nullable();
			$table->decimal('yeast_rate')->nullable();
			$table->integer('yield_amount')->nullable();
			$table->integer('co2_amount')->nullable();
			$table->integer('energy_cost')->nullable();
			$table->integer('score')->nullable();
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
		Schema::drop('experiment');
	}

}
