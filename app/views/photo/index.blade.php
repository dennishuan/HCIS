
@extends('layouts/default')

@section('content')

	<h1> upload image file </h1>
	
	{{Form::open(array('url' => 'upload','files' => true))}}
	  image: {{Form::file('image')}}
		{{$errors->first()}}
	<div>
	  ref: {{ $patient->phn }} HealthNumber
		{{Form::hidden('ref', $patient->phn)}}
		{{Form::submit('upload')}}
		{{Form::reset('reset')}}
	</div>
	{{Form::close()}}

@stop
