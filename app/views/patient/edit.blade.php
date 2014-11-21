@extends('layouts.master')

@section('content')
	<div id="Patient" class="tab-pane fade in active container">
		<h1>Edit: {{ $patient->preferred_name }}</h1>
		<div class="row">
			{{ Form::model($patient, ['method'=>'PUT', 'route'=>['patient.update', $patient->id]]) }}
			
			<!-- Left side of form -->
				<div class="col col-md-6 col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">Personal Health Number:</span>
						{{ Form::text('phn', $patient->phn, ['class' => 'form-control']) }}
						{{ $errors->first('phn') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Preferred Name:</span>
						{{ Form::text('preferred_name', $patient->preferred_name, ['class' => 'form-control']) }}
						{{ $errors->first('preferred_name') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Postal Code:</span>
						{{ Form::text('postal_code', $patient->postal_code, ['class' => 'form-control']) }}
						{{ $errors->first('postal_code') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Date of Birth:</span>
						{{ Form::text('date_of_birth', $patient->date_of_birth, ['class' => 'form-control']) }}
						{{ $errors->first('date_of_birth') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Work Phone Number:</span>
						{{ Form::text('work_phone', $patient->work_phone, ['class' => 'form-control']) }}
						{{ $errors->first('work_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Name:</span>
						{{ Form::text('emergency_name', $patient->emergency_name, ['class' => 'form-control']) }}
						{{ $errors->first('emergency_name') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Relationship:</span>
						{{ Form::text('emergency_relationship', $patient->emergency_relationship, ['class' => 'form-control']) }}
						{{ $errors->first('emergency_relationship') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Permanent Resident:</span>
						{{ Form::select('permanent_resident', array(' ' => ' ', '1' => 'Yes', '0' => 'No'), 
                           $patient->permanent_resident, ['class' => 'form-control'])}}
						{{ $errors->first('permanent_resident') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Other Language:</span>
						{{ Form::text('other_language', $patient->other_language, ['class' => 'form-control']) }}
						{{ $errors->first('other_language') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Family Doctor:</span>
						{{ Form::text('family_doctor', $patient->family_doctor, ['class' => 'form-control']) }}
						{{ $errors->first('family_doctor') }}
					</div>
							
					<div class="input-group buffer">
						{{ Form::submit('Make Changes', ['class' => 'btn btn-info'])}}
					</div>
				</div>
				
				<!-- Right side of form -->
				<div class="col col-md-6 col-lg-6">	
					<div class="input-group">
						<span class="input-group-addon">Full Name:</span>
						{{ Form::text('name', $patient->name, ['class' => 'form-control']) }}
						{{ $errors->first('name') }}
					</div>
						
					<div class="input-group buffer">
						<span class="input-group-addon">Sex:</span>
						{{ Form::select('sex', array(' ' => ' ', 'male' => 'male', 'female' => 'female'), 
                           $patient->sex, ['class' => 'form-control'])}}
						{{ $errors->first('sex') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Address:</span>
						{{ Form::text('address', $patient->address, ['class' => 'form-control']) }}
						{{ $errors->first('address') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Phone Number:</span>
						{{ Form::text('home_phone', $patient->home_phone, ['class' => 'form-control']) }}
						{{ $errors->first('home_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Mobile Phone Number:</span>
						{{ Form::text('mobile_phone', $patient->mobile_phone, ['class' => 'form-control']) }}
						{{ $errors->first('mobile_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Phone:</span>
						{{ Form::text('emergency_phone', $patient->emergency_phone, ['class' => 'form-control']) }}
						{{ $errors->first('emergency_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Allergies:</span>
						{{ Form::text('allergies', $patient->allergies, ['class' => 'form-control']) }}
						{{ $errors->first('allergies') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Preferred Language:</span>
						{{ Form::text('preferred_language', $patient->preferred_language, ['class' => 'form-control']) }}
						{{ $errors->first('preferred_language') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Ethnic Background:</span>
						{{ Form::text('ethnic_background', $patient->ethnic_background, ['class' => 'form-control']) }}
						{{ $errors->first('ethnic_background') }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop
