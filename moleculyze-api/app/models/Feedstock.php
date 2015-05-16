<?php

class Feedstock extends \Eloquent {

	protected $table = 'feedstock';

	protected $fillable = [
		'id',
		'name',
		'fiber_percentage_low',
		'fiber_percentage_high'
	];

}