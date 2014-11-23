@extends('layouts/master')

@section('content')

 <h1>New Patient Created</h1>

 <p> This Patient model is now in the DB

	<li>phn: {{ $patient->phn }}</li>
	<li>name: {{ $patient->name }}</li>
	<li>preferred_name: {{ $patient->preferred_name }}</li>
	<li>sex: {{ $patient->sex }}</li>
	<li>birthday: {{ $patient->date_of_birth }}</li>

 </p>

@stop
