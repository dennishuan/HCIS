@extends('layouts.master')

@section('content')
	<div id="Patient" class="tab-pane fade in active container">
		<h1>Create Record</h1>
		<div class="row">
		{{ Form::open(['route' => 'record.store']) }}
			<!-- Left side of form -->
				<div class="col col-md-6 col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">Legal Name:</span>
						{{ Form::text('name', null, ['class' => 'form-control']) }}
						{{ $errors->first('name') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Sex:</span>
						{{ Form::select('sex', array(' ' => ' ', 'male' => 'male', 'female' => 'female'), 
                           ' ', ['class' => 'form-control']) }}
						{{ $errors->first('sex') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Address:</span>
						{{ Form::text('address', null, ['class' => 'form-control']) }}
						{{ $errors->first('address') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Home Phone:</span>
						{{ Form::text('home_phone', null, ['class' => 'form-control']) }}
						{{ $errors->first('home_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Mobile Phone:</span>
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
					
					<div class="input-group buffer">
						<span class="input-group-addon">Priority:</span>
						{{ Form::select('priority', array(' '=>' ','1'=>'1','2'=>'2','3'=>'3','4'=>'4',
                           '5'=>'5','6'=>'6'), ' ',['class' => 'form-control']) }}
						{{ $errors->first('priority') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Admittance Date:</span>
						{{ Form::text('admit_datetime', null, ['class' => 'form-control']) }}
						{{ $errors->first('admit_datetime') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Arrival Mode:</span>
						{{ Form::text('arrival_mode', null, ['class' => 'form-control']) }}
						{{ $errors->first('arrival_mode') }}
					</div>
				</div>
				
				<!-- Right side of form -->
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
						<span class="input-group-addon">Date of Birth:</span>
						{{ Form::text('date_of_birth', null, ['class' => 'form-control']) }}
						{{ $errors->first('date_of_birth') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Postal Code:</span>
						{{ Form::text('postal_code', null, ['class' => 'form-control']) }}
						{{ $errors->first('phn') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Work Phone:</span>
						{{ Form::text('work_phone', null, ['class' => 'form-control']) }}
						{{ $errors->first('work_phone') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contact Name:</span>
						{{ Form::text('emergency_name', null, ['class' => 'form-control']) }}
						{{ $errors->first('emergency_name') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Emergency Contract Relationship:</span>
						{{ Form::text('emergency_relationship', null, ['class' => 'form-control']) }}
						{{ $errors->first('emergency_relationship') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Permanent Resident:</span>
						{{ Form::select('permanent_resident', array(' ' => ' ', '1' => 'Yes', '0' => 'No'), 
                           ' ', ['class' => 'form-control'])}}
						{{ $errors->first('permanent_resident') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Preferred Language:</span>
						{{ Form::text('preferred_language', null, ['class' => 'form-control']) }}
						{{ $errors->first('preferred_language') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Doctor:</span>
						{{ Form::text('family_doctor', null, ['class' => 'form-control']) }}
						{{ $errors->first('family_doctor') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Registration Date:</span>
						{{ Form::text('reg_datetime', null, ['class' => 'form-control']) }}
						{{ $errors->first('reg_datetime') }}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Chief Complaint Code:</span>
						{{ Form::text('chief_compl_code', null, ['class' => 'form-control']) }}
						{{ $errors->first('chief_compl_code') }}
					</div>
				</div>
				
				<!-- Text Fields -->
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="stated_complaint">Stated Complaint</label>
					</div>
					<textarea class="form-control" rows="3" id="stated_complaint" placeholder="Stated Complaint"></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="chief_complaint">Chief Complaint</label>
					</div>
					<textarea class="form-control" rows="3" id="chief_complaint" placeholder="Chief Complaint"></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="subjective">Subjective</label>
					</div>
					<textarea class="form-control" rows="3" id="subjective" placeholder="Subjective"></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="objective">Objective</label>
					</div>
					<textarea class="form-control" rows="3" id="objective" placeholder="Objective"></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="assessment">Assessment</label>
					</div>
					<textarea class="form-control" rows="3" id="assessment" placeholder="Assessment"></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="prescription">Prescription</label>
					</div>
					<textarea class="form-control" rows="3" id="prescription" placeholder="Prescription"></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="remarks">Remarks</label>
					</div>
					<textarea class="form-control" rows="3" id="remarks" placeholder="Remarks"></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="plan">Plan</label>
					</div>
					<textarea class="form-control" rows="3" id="plan" placeholder="Plan"></textarea>
				</div>
				
				
				<!-- Buttons -->
				<div class="col col-md-6 col-lg-6">
					<div class="input-group buffer">
						{{ Form::submit('Create Record', ['class' => 'btn btn-info'])}}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop
