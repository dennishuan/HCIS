
@extends('layouts.default')

@section('content')

        <h2>Current Patients</h2>
	
	<div>
         {{ HTML::linkAction('PatientController@create','CREATEBUTTON') }}
	</div>

        @foreach($patients as $patient)

                <li>{{ HTML::linkAction('PatientController@show', $patient->first_name, $patient->first_name)}}</li>

        @endforeach

        <p>{{ HTML::linkAction('PatientController@create','CREATEBUTTON') }}</p>

@stop


