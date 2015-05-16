<?php

class Enzyme extends \Eloquent {

	protected $table = 'enzyme';

	protected $fillable = [
		'id',
		'name',
		'type',
		'temp_low',
		'temp_high',
		'rate_low',
		'rate_high'
	];

	public function scopeStarch($query)
	{
		return $query->where('enzyme.type', '=', 'starch');
	}

	public function scopeFiber($query)
	{
		return $query->where('enzyme.type', '=', 'fiber');
	}

	public function scopeYeast($query)
	{
		return $query->where('enzyme.type', '=', 'yeast');
	}
}