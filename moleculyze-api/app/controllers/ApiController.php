<?php

class ApiController extends BaseController {

	public function base()
	{
		$content = array('return'=>'true');
		return Response::json($content);
	}

}
