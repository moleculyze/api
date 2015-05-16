<?php

class Experiment extends Eloquent {

	protected $table = 'experiment';

	protected $fillable = [
		'id',
		'fiber_percentage',
		'starch_percentage',
		'enzyme1_temp',
		'enzyme1_rate',
		'enzyme2_temp',
		'enzyme2_rate',
		'enzyme3_temp',
		'enzyme3_rate',
		'enzyme4_temp',
		'enzyme4_rate',
		'yeast_temp',
		'yeast_rate',
		'yield_amount', //most
		'co2_amount', //least
		'energy_cost', //least
		'score'
	];

	public static $rules = [
		'fiber_percentage' => 'required|numeric',
		'starch_percentage' => 'required|numeric',
		'enzyme1_temp' => 'required|numeric',
		'enzyme1_rate' => 'required|numeric',
		'enzyme2_temp' => 'required|numeric',
		'enzyme2_rate' => 'required|numeric',
		'enzyme3_temp' => 'required|numeric',
		'enzyme3_rate' => 'required|numeric',
		'enzyme4_temp' => 'required|numeric',
		'enzyme4_rate' => 'required|numeric',
		'yeast_temp' => 'required|numeric',
		'yeast_rate' => 'required|numeric'
	];

}
