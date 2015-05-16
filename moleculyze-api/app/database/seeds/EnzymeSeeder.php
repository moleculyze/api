<?php
class EnzymeSeeder extends BaseSeeder {
	//static seeds array return for tests
	public static function getSeeds(){

		$seeds = array();
		$seeds[] = [
			'name' => 'Cellulase I',
			'temp_low' => '0',
			'temp_high' => '200',
			'rate_low' => '0',
			'rate_high' => '10'
		];
		$seeds[] = [
			'name' => 'Cellulase II',
			'temp_low' => '0',
			'temp_high' => '200',
			'rate_low' => '0',
			'rate_high' => '10'
		];
		$seeds[] = [
			'name' => 'Alpha Anylase I',
			'temp_low' => '0',
			'temp_high' => '200',
			'rate_low' => '0',
			'rate_high' => '10'
		];
		$seeds[] = [
			'name' => 'Glucoanylase II',
			'temp_low' => '0',
			'temp_high' => '200',
			'rate_low' => '0',
			'rate_high' => '10'
		];

		return $seeds;
	}

	public function run()
	{
		DB::table('enzyme')->delete();
		$seeds = self::getSeeds();
		$count = sizeof($seeds);
		$complete = 0;
		$this->printMsg("Seeding Enzme (".$complete.'/'.$count.")", "\r");
		foreach($seeds as $seed){
			Enzyme::create($seed);
			$this->printMsg("Seeding Enzyme (".(++$complete).'/'.$count.")", "\r");
		}
		$this->printMsg('');
	}
}