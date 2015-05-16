<?php

class ApiController extends BaseController {

	public function base()
	{
		return View::make('documentation');
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
		if(Experiment::find($id)){
			$validator = Validator::make(Input::all(), Experiment::$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Response::json(array('status'=>'400','messages'=>$messages));
			} else {
				return Response::json(array('status'=>'200','messages'=>array('this does not work yet')));
			}
		} else {
			return Response::json(array('status'=>'404','messages'=>array('experiment '.$id.' not found')));
		}
	}

	public function getExperimentResults($id)
	{
		if($experiment = Experiment::find($id)){
			if($experiment->score != null){
				$result = [
					'yield_amount' => $experiment->yield_amount,
					'co2_amount' => $experiment->co2_amount,
					'energy_cost' => $experiment->energy_cost,
					'score' => $experiment->score
				];
				return Response::json(array('status'=>'200','result'=>$result));
			}
			return Response::json(array('status'=>'400','messages'=>array('experiment '.$id.' has not been run')));
		} else {
			return Response::json(array('status'=>'404','messages'=>array('experiment '.$id.' not found')));
		}
	}

}
