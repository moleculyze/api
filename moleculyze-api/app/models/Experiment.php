<?php

class Experiment extends Eloquent {

	protected $table = 'experiment';

	protected $fillable = [
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

	public static $config = [
		'percentage_low' => 0,
		'percentage_high' => 100,
		'enzyme1_temp_low' => 50,
		'enzyme1_temp_high' => 200,
		'enzyme2_temp_low' => 50,
		'enzyme2_temp_high' => 100,
		'enzyme3_temp_low' => 50,
		'enzyme3_temp_high' => 200,
		'enzyme4_temp_low' => 50,
		'enzyme4_temp_high' => 100,
		'yeast_temp_low' => 50,
		'yeast_temp_high' => 100,
		'rate_low' => 0,
		'rate_high' => 100
	];

	public static $defaults = [
		'fiber_percentage' => 50,
		'starch_percentage' => 50,
		'enzyme1_temp' => 50,
		'enzyme1_rate' => 0,
		'enzyme2_temp' => 50,
		'enzyme2_rate' => 0,
		'enzyme3_temp' => 50,
		'enzyme3_rate' => 0,
		'enzyme4_temp' => 50,
		'enzyme4_rate' => 0,
		'yeast_temp' => 50,
		'yeast_rate' => 0
	];

	public static $rules = [
		'fiber_percentage' => 'required|numeric|min:0|max:100',
		'starch_percentage' => 'numeric|min:0|max:100',
		'enzyme1_temp' => 'required|numeric|min:50|max:200',
		'enzyme1_rate' => 'required|numeric|min:0|max:100',
		'enzyme2_temp' => 'required|numeric|min:50|max:100',
		'enzyme2_rate' => 'required|numeric|min:0|max:100',
		'enzyme3_temp' => 'required|numeric|min:50|max:200',
		'enzyme3_rate' => 'required|numeric|min:0|max:100',
		'enzyme4_temp' => 'required|numeric|min:50|max:100',
		'enzyme4_rate' => 'required|numeric|min:0|max:100',
		'yeast_temp' => 'required|numeric|min:50|max:100',
		'yeast_rate' => 'required|numeric|min:0|max:100'
	];

}
