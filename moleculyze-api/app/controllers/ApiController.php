<?php

class ApiController extends BaseController {

	public function base()
	{
		return View::make('documentation');
	}

	public function config()
	{
		$config = [
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
		return Response::json(array('status'=>'200','config'=>$config));
	}

	public function startExperiment()
	{
		$experiment = Experiment::create(
			[
				'fiber_percentage' => 0,
				'starch_percentage' => 0,
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
			]
		);
		$result = array('status'=>'200','result'=>$experiment);
		return Response::json($result);
	}

	public function runExperiment($id)
	{
		if($experiment = Experiment::find($id)){
			$validator = Validator::make(Input::all(), Experiment::$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Response::json(array('status'=>'400','messages'=>$messages));
			} else {
				$experiment->fill(Input::all());
				$experiment->save();
				$e = (100)*$experiment->starch_percentage + $experiment->enzyme1_temp + $experiment->enzyme2_temp;
				$experiment->energy_cost = $e;
				$experiment->save();
				$y = (100)*$experiment->starch_percentage + (80)*$experiment->fiber_percentage + $experiment->enzyme1_rate + $experiment->enzyme2_rate + $experiment->enzyme3_rate;
				$experiment->yield_amount = $y;
				$experiment->save();
				return Response::json(array('status'=>'200','location'=>'/experiment/results/'.$experiment->id));
			}
		} else {
			return Response::json(array('status'=>'404','messages'=>array('experiment '.$id.' not found')));
		}
	}

	public function getExperimentResults($id)
	{
		if($experiment = Experiment::find($id)){
			if($experiment->energy_cost != null){
				$result = [
					'yield_amount' => $experiment->yield_amount,
					'co2_amount' => $experiment->co2_amount,
					'energy_cost' => $experiment->energy_cost,
					'score' => $experiment->score
				];
				return Response::json(array('status'=>'200','result'=>$result));
			} else {
				return Response::json(array('status'=>'400','messages'=>array('experiment '.$id.' has not been run')));
			}
		} else {
			return Response::json(array('status'=>'404','messages'=>array('experiment '.$id.' not found')));
		}
	}

}
