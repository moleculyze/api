@extends('layouts.default')

@section('content')
<ul>
	<li><b>GET 'experiment/start'</b>: starts an experiment - returns default values for experiment to be run</li>
	<li><b>POST 'experiment/run/{id}'</b>: runs an experiment with posted data - returns the location of the results or errors and where they exist</li>
	<li><b>GET 'experiment/results/{id}'</b>: displays the results of the experiment indicated</li>
</ul>
@stop