
@extends('layouts.default')

@section('content')

        <h2>Current Patients</h2>

        @foreach($patients as $patient)

                <li>{{ HTML::linkAction('PatientController@show', $patient->name, $patient->name) }}</li>

        @endforeach

        <p>{{ HTML::linkAction('PatientController@create','CREATEBUTTON') }}</p>

@stop


