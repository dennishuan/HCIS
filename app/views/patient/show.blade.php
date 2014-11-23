@extends('layouts.default')

@section('content')

	<h2>This is a Patient</h2>

	<div>
	{{ link_to_route('export', 'export', ['id' => $patient->id]) }}
	</div>

	<div>
	{{ link_to_action('PatientController@edit', 'edit', array($patient->id)); }}
	</div>

	<p>
	 <li> phn: {{ $patient->phn }} </li>
	 <li> first_name: {{ $patient->first_name }} </li>
	 <li> last_name: {{ $patient->last_name }} </li>
	 </p>
@stop
