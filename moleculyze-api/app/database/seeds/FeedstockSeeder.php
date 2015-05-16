<?php
class FeedstockSeeder extends BaseSeeder {
	//static seeds array return for tests
	public static function getSeeds(){

		$seeds = array();
		$seeds[] = [
			'name' => 'corn 1',
			'fiber_percentage_low' => '0',
			'fiber_percentage_high' => '100'
		];
		$seeds[] = [
			'name' => 'corn 2',
			'fiber_percentage_low' => '0',
			'fiber_percentage_high' => '100'
		];

		return $seeds;
	}

	public function run()
	{
		DB::table('feedstock')->delete();
		$seeds = self::getSeeds();
		$count = sizeof($seeds);
		$complete = 0;
		$this->printMsg("Seeding Feedstock (".$complete.'/'.$count.")", "\r");
		foreach($seeds as $seed){
			Feedstock::create($seed);
			$this->printMsg("Seeding Feedstock (".(++$complete).'/'.$count.")", "\r");
		}
		$this->printMsg('');
	}
}