@extends('layouts.default')

@section('content')

	<h2>This is a Patient</h2>
	
	{{ link_to_action('PatientController@edit', 'edit', array($patient->id)); }}
	

	<p> {{ dd($patient); }} </p>
@stop
