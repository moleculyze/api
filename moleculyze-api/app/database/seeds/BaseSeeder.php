<?php

class BaseSeeder extends Seeder {

	/**
	 * outputs message to console
	 */
	public function printMsg($msg, $eol="\n")
	{
		// every test reseeds so suppress messages during testing
		if (App::environment() != 'testing') {
			echo $msg . $eol;
		}
	}

}