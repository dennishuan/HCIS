@extends('layouts.default')


@section('content')

        
        <h2>Create User</h2>

        {{ Form::open(['route' => 'patient.store']) }}

        <div>
                {{ Form::label('phn', 'HealthNumber: ') }}
                {{ Form::input('text', 'phn') }}
		{{ $errors->first('phn') }}
        </div>


        <div>
                {{ Form::label('first_name', 'first name: ') }}
                {{ Form::text('first_name') }}
		{{ $errors->first('first_name') }} 
        </div>

	<div>
		{{ Form::label('last_name', 'last name: ') }}
		{{ Form::text('last_name') }}
		{{ $errors->first('last_name') }}
	</div>

	 <div>
        	{{ Form::label('sex', 'sex: ') }}
         	{{ Form::text('sex') }}
		{{ $errors->first('sex') }} 
        </div>
	

        <div>
                {{ Form::label('date_of_birth', 'birthdate: ') }}
                {{ Form::text('date_of_birth') }}
		{{ $errors->first('date_of_birth') }}
        </div>

        <div>
                {{ Form::label('address', 'address: ') }}
                {{ Form::text('address') }}
		{{ $errors->first('address') }}
        </div>

        <div>
                {{ Form::label('postal_code', 'postalcode: ') }}
                {{ Form::text('postal_code') }}
		{{ $errors->first('postal_code') }}
        </div>

	<div>
        	{{ Form::label('phone', 'phonenumber: ') }}
        	{{ Form::text('phone') }} 
		{{ $errors->first('phone') }}
        </div>
	
	<div>
        	{{ Form::label('family_doctor', 'family_doctor: ') }}
        	{{ Form::text('family_doctor') }}
		{{ $errors->first('family_doctor') }}
	</div>

        <div>   {{ Form::submit() }} </div>

        {{ Form::close() }}
@stop
