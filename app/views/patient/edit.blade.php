@extends('layouts.default')

@section('content')

        <h3>Edit User</h3>
	<p>Note: Must Create New Patient to change Health Number</p>
		
        {{ Form::model($patient, ['method'=>'PUT','route' => ['patient.update', $patient->id]]) }}
	   <div>
                HealthNumber: {{ $patient->phn }}
           </div>

	   <div>
		{{ Form::hidden('phn') }}
	   </div>

	   <div>
		{{ Form::label('first_name', 'First Name: ') }}
		{{ Form::input('text', 'first_name') }}
		{{ $errors->first('first_name') }}
	   </div>

	   <div>
		{{ Form::label('last_name', 'Last Name: ') }}
		{{ Form::input('text', 'last_name') }}
		{{ $errors->first('last_name') }}
	   </div>

           <div>
                {{ Form::label('sex', 'Sex: ') }}
                {{ Form::text('sex' ) }}
                {{ $errors->first('sex') }}
           </div>

           <div>
                {{ Form::label('date_of_birth', 'Birthdate: ') }}
                {{ Form::text('date_of_birth' ) }}
                {{ $errors->first('date_of_birth') }}
           </div>

           <div>
                {{ Form::label('address', 'Address: ') }}
                {{ Form::text('address' ) }}
                {{ $errors->first('address') }}
           </div>

           <div>
                {{ Form::label('postal_code', 'PostalCode: ') }}
                {{ Form::text('postal_code' ) }}
                {{ $errors->first('postal_code') }}
           </div>

           <div>
                {{ Form::label('phone', 'PhoneNumber: ') }}
                {{ Form::text('phone' ) }}
                {{ $errors->first('phone') }}
           </div>

           <div>
                {{ Form::label('family_doctor', 'Family_Doctor: ') }}
                {{ Form::text('family_doctor' ) }}
                {{ $errors->first('family_doctor') }}
           </div>
           
	   <div>     
		{{ Form::submit() }}
	   </div>
        {{ Form::close() }}

@stop

