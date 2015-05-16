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
		$result = array('status'=>'200','experiment'=>$experiment);
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
		if(Experiment::find($id)){
			//
		} else {
			return Response::json(array('status'=>'404','message'=>'experiment '.$id.' not found'));
		}
	}

}
