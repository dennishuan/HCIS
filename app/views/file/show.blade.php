@extends('layouts/default')

@section('content')

 <h1>New Patient Created

 <p>
	<li>phn: {{ $patient->phn }}</li>
	<li>First_name: {{ $patient->first_name }}</li>
        <li>Last_name: {{ $patient->last_name }}</li>

 </p>


@stop
