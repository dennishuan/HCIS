@extends('layouts.master')

@section('content')
	<div id="Patient" class="tab-pane fade in active container">
		<h1>Create Patient</h1>
		<div class="row">
			{{ Form::open(['route' => 'patient.store']) }}
			
			<!-- Left side of form -->
				<div class="col col-md-6 col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">Personal Health Number:</span>
						{{ Form::text('phn', null, ['class' => 'form-control']) }}
						{{ $errors->first('phn') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Preferred Name:</span>
						{{ Form::text('preferred_name', null, ['class' => 'form-control']) }}
						{{ $errors->first('preferred_name') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Postal Code:</span>
						{{ Form::text('postal_code', null, ['class' => 'form-control']) }}
						{{ $errors->first('postal_code') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Date of Birth:</span>
						{{ Form::text('date_of_birth', null, ['class' => 'form-control']) }}
						{{ $errors->first('date_of_birth') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Work Phone Number:</span>
						{{ Form::text('work_phone', null, ['class' => 'form-control']) }}
						{{ $errors->first('work_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Name:</span>
						{{ Form::text('emergency_name', null, ['class' => 'form-control']) }}
						{{ $errors->first('emergency_name') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Relationship:</span>
						{{ Form::text('emergency_relationship', null, ['class' => 'form-control']) }}
						{{ $errors->first('emergency_relationship') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Permanent Resident:</span>
						<select class="form-control" name="permanent_resident">
							<option value="">All</option>
							<option value="1">Yes</option>
							<option value="0">No</option>
						</select>
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Other Language:</span>
						{{ Form::text('other_language', null, ['class' => 'form-control']) }}
						{{ $errors->first('other_language') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Family Doctor:</span>
						{{ Form::text('family_doctor', null, ['class' => 'form-control']) }}
						{{ $errors->first('family_doctor') }}
					</div>
							
					<div class="input-group buffer">
						{{ Form::submit('Create Patient', ['class' => 'btn btn-info'])}}
					</div>
				</div>
				
				<!-- Right side of form -->
				<div class="col col-md-6 col-lg-6">	
					<div class="input-group">
						<span class="input-group-addon">Full Name:</span>
						{{ Form::text('name', null, ['class' => 'form-control']) }}
						{{ $errors->first('name') }}
					</div>
						
					<div class="input-group buffer">
						<span class="input-group-addon">Sex:</span>
						<select class="form-control" name="sex">
							<option value="">All</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Address:</span>
						{{ Form::text('address', null, ['class' => 'form-control']) }}
						{{ $errors->first('address') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Phone Number:</span>
						{{ Form::text('home_phone', null, ['class' => 'form-control']) }}
						{{ $errors->first('home_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Mobile Phone Number:</span>
						{{ Form::text('mobile_phone', null, ['class' => 'form-control']) }}
						{{ $errors->first('mobile_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Phone:</span>
						{{ Form::text('emergency_phone', null, ['class' => 'form-control']) }}
						{{ $errors->first('emergency_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Allergies:</span>
						{{ Form::text('allergies', null, ['class' => 'form-control']) }}
						{{ $errors->first('allergies') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Preferred Language:</span>
						{{ Form::text('preferred_language', null, ['class' => 'form-control']) }}
						{{ $errors->first('preferred_language') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Ethnic Background:</span>
						{{ Form::text('ethnic_background', null, ['class' => 'form-control']) }}
						{{ $errors->first('ethnic_background') }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop
