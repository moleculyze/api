<?php

class Enzyme extends \Eloquent {

	protected $table = 'enzyme';

	protected $fillable = [
		'id',
		'name',
		'temp_low',
		'temp_high',
		'rate_low',
		'rate_high'
	];
}