@extends('layouts/default')

@section('content')
	
	{{Form::open(array('url' => 'upload','files' => true))}}
	  image: {{Form::file('image')}}
	  ref:	{{Form::text('ref')}}
		{{Form::submit('upload')}}
	{{Form::close()}}

	@foreach($patients as $patient)
	<li> {{	$patient->phn; }} </li>
	@endforeach
@stop
