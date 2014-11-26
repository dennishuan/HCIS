@extends('layouts.default')

@section('content')

	<h2>This is a Patient</h2>

	<div>
	{{ link_to_route('export', 'export', ['id' => $patient->id], ['class'=>'btn btn btn-default']) }}
	{{ link_to_action('PatientController@edit', 'edit', array($patient->id), ['class'=>'btn btn btn-default']) }}
	{{ link_to_action('PhotoController@index', 'addPicture', ['id' => $patient->id], ['class'=>'btn btn btn-default']) }}
	{{ link_to_action('AppointController@index', 'makeAppointment', [$patient->id], ['class'=>'btn btn btn-default']) }}
	{{ link_to_route('delete', 'delete', ['id' => $patient->id], ['class'=>'btn btn btn-default']) }}
	</div>

	<p>
	 <li> phn: {{ $patient->phn }} </li>
	 <li> first_name: {{ $patient->first_name }} </li>
	 <li> last_name: {{ $patient->last_name }} </li>
	 </p>
@stop
