@extends('layouts.default')

@section('content')
{{ $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] }}
<ul>
	<li><b>GET /config</b>: shows the high/low values for front end sliders</li>
	<li><b>GET /start</b>: starts an experiment - returns default values for experiment to be run</li>
	<li><b>POST /run/{id}</b>: runs an experiment with posted data - returns the location of the results or errors and where they exist</li>
	<li><b>GET /results/{id}</b>: displays the results of the experiment indicated</li>
</ul>
@stop