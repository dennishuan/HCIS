
@extends('layouts.default')

@section('content')

        <h2>Current Patients</h2>
	
	<div>
         {{ HTML::linkAction('PatientController@create','CREATENEW','', ['class' => 'btn btn btn-default']) }}
	 {{ HTML::linkAction('FileController@index','UPLOADPATIENTS','',['class'=>'btn btn btn-default']) }}
	 {{ HTML::linkAction('FileController@exportall','EXPORTPATIENTS','',['class'=>'btn btn btn-default']) }}
	</div>

	<h3>Select patient to view/edit/makeappointment</p>

        @foreach($patients as $patient)

                <li>{{ HTML::linkAction('PatientController@show', $patient->first_name, $patient->phn)}}</li>

        @endforeach


@stop


