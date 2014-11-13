@extends('layouts.default')

@section('content')

        <h3>Edit User</h3>
	
		
        {{ Form::model($patient, ['route' => 'patient.update']) }}
	   <div>
                {{ Form::label('phn', 'HealthNumber: ') }}
                {{ Form::text('phn' ) }}
		{{ $errors->first('phn') }}
	   </div>

	   <div>
		{{ Form::label('name', 'Name: ') }}
		{{ Form::input('text', 'name') }}
		{{ $errors->first('name') }}
	   </div>

           <div>
                {{ Form::label('sex', 'Sex: ') }}
                {{ Form::text('sex' ) }}
                {{ $errors->first('sex') }}
           </div>

           <div>
                {{ Form::label('birth_date', 'Birthdate: ') }}
                {{ Form::text('birthdate' ) }}
                {{ $errors->first('birthdate') }}
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

