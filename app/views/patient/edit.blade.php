@extends('layouts.master')

@section('content')
	<div id="Patient" class="tab-pane fade in active container">
		<h1>Edit Patient</h1>
		<div class="row">
			{{ Form::model($patient, ['method'=>'PUT', 'route'=>['patient.update', $patient->id]]) }}
			
			<!-- Left side of form -->
				<div class="col col-md-6 col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">Personal Health Number:</span>
						{{ Form::text('phn'}}
						{{ $errors->first('phn') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Preferred Name:</span>
						{{ Form::text('preferred_name'}}
						{{ $errors->first('preferred_name') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Postal Code:</span>
						{{ Form::text('postal_code'}}
						{{ $errors->first('postal_code') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Date of Birth:</span>
						{{ Form::text('date_of_birth'}}
						{{ $errors->first('date_of_birth') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Work Phone Number:</span>
						{{ Form::text('work_phone'}}
						{{ $errors->first('work_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Name:</span>
						{{ Form::text('emergency_name'}}
						{{ $errors->first('emergency_name') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Relationship:</span>
						{{ Form::text('emergency_relationship'}}
						{{ $errors->first('emergency_relationship') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Permanent Resident:</span>
						{{ Form::text('permanent_resident'}}
						{{ $errors->first('permanent_resident') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Other Language:</span>
						{{ Form::text('other_language'}}
						{{ $errors->first('other_language') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Family Doctor:</span>
						{{ Form::text('family_doctor'}}
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
						{{ Form::text('name'}}
						{{ $errors->first('name') }}
					</div>
						
					<div class="input-group buffer">
						<span class="input-group-addon">Sex:</span>
						{{ Form::text('sex'}}
						{{ $errors->first('sex') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Address:</span>
						{{ Form::text('address'}}
						{{ $errors->first('address') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Phone Number:</span>
						{{ Form::text('home_phone'}}
						{{ $errors->first('home_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Mobile Phone Number:</span>
						{{ Form::text('mobile_phone'}}
						{{ $errors->first('mobile_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Phone:</span>
						{{ Form::text('emergency_phone'}}
						{{ $errors->first('emergency_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Allergies:</span>
						{{ Form::text('allergies'}}
						{{ $errors->first('allergies') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Preferred Language:</span>
						{{ Form::text('preferred_language'}}
						{{ $errors->first('preferred_language') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Ethnic Background:</span>
						{{ Form::text('ethnic_background'}}
						{{ $errors->first('ethnic_background') }}
					</div>
				</div>
			{{Form::close}}
		</div>
	</div>
@stop
