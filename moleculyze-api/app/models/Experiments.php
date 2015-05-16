<?php

class Experiments extends Eloquent {

	protected $table = 'experiment';

	protected $fillable = [
		'id',
		'feedstock_id',
		'fiber_percentage',
		'starch_percentage',
		'enzyme1_id',
		'enzyme1_temp',
		'enzyme1_rate',
		'enzyme2_id',
		'enzyme2_temp',
		'enzyme2_rate',
		'enzyme3_id',
		'enzyme3_temp',
		'enzyme3_rate',
		'enzyme4_id',
		'enzyme4_temp',
		'enzyme4_rate',
		'yeastbacteria_id',
		'yeastbacteria_temp',
		'yeastbacteria_rate',
		'yield_amount', //most
		'co2_amount', //least
		'energy_cost', //least
		'score'
	];

}
