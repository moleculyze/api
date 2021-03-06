<?php

class ApiController extends BaseController {

	public function base()
	{
		return View::make('documentation');
	}

	public function config()
	{
		$config = Experiment::$config;
		return Response::json(array('status'=>200,'config'=>$config))->setCallback(Input::get('callback'));
	}

	public function startExperiment()
	{
		$experiment = Experiment::create(Experiment::$defaults);
		$result = array('status'=>200,'result'=>$experiment);
		return Response::json($result)->setCallback(Input::get('callback'));
	}

	public function runExperiment($id)
	{
		if($experiment = Experiment::find($id)){
			$validator = Validator::make(Input::all(), Experiment::$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Response::json(array('status'=>400,'messages'=>$messages));
			} else {
				$experiment->fill(Input::all());
				$experiment->starch_percentage = 100 - $experiment->fiber_percentage;
				$experiment->yeast_temp = $experiment->enzyme2_temp;
				$experiment->yeast_rate = $experiment->enzyme2_rate;
				$experiment->save();
				$e = $experiment->starch_percentage + $experiment->enzyme1_temp + $experiment->enzyme2_temp;
				$experiment->energy_cost = $e;
				$experiment->save();
				$y = $experiment->starch_percentage + (.8)*$experiment->fiber_percentage + $experiment->enzyme1_rate + $experiment->enzyme2_rate + $experiment->enzyme3_rate;
				$experiment->yield_amount = $y;
				$experiment->save();
				return Response::json(array('status'=>200,'location'=>'/experiment/results/'.$experiment->id));
			}
		} else {
			return Response::json(array('status'=>404,'messages'=>array('experiment '.$id.' not found')));
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
				return Response::json(array('status'=>200,'result'=>$result))->setCallback(Input::get('callback'));
			} else {
				return Response::json(array('status'=>400,'message'=>'experiment '.$id.' has not been run'))->setCallback(Input::get('callback'));
			}
		} else {
			return Response::json(array('status'=>404,'message'=>'experiment '.$id.' not found'))->setCallback(Input::get('callback'));
		}
	}

}
