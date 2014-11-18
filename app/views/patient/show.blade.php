@extends('layouts.master')

@section('content')
	<div id="Patient" class="tab-pane fade in active container">
		<h3>Patient</h1>
		<div class="row">
			{{ Form::open}}
			
			<!-- Left side of form -->
				<div class="col col-md-6 col-lg-6">
					<fieldset disabled>
						<div class="input-group">
							<span class="input-group-addon">Personal Health Number:</span>
							{{ Form::text('phn', $patient->phn}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Preferred Name:</span>
							{{ Form::text('preferred_name', $patient->preferred_name}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Postal Code:</span>
							{{ Form::text('postal_code', $patient->postal_code}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Date of Birth:</span>
							{{ Form::text('date_of_birth', $patient->date_of_birth}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Work Phone Number:</span>
							{{ Form::text('work_phone', $patient->work_phone}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Emergency Contact Name:</span>
							{{ Form::text('emergency_name', $patient->emergency_name}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Emergency Contact Relationship:</span>
							{{ Form::text('emergency_relationship', $patient->emergency_relationship}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Permanent Resident:</span>
							{{ Form::text('permanent_resident', $patient->permanent_resident}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Other Language:</span>
							{{ Form::text('other_language', $patient->other_language}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Family Doctor:</span>
							{{ Form::text('family_doctor', $patient->family_doctor}}
						</div>
		
					</fieldset>
					
					<div class="input-group buffer">
						<nav>
							{{ link_to_route('user.index', 'Index', [], ['class' => 'btn btn-info']) }}
							|
							{{ link_to_route('user.edit', 'Edit', [$user->id], ['class' => 'btn btn-info']) }}
							|
							{{ Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
								{{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
							{{ Form::close() }}
						</nav>
					</div>
				</div>
				
				<!-- Right side of form -->
				<div class="col col-md-6 col-lg-6">	
					<fieldset disabled>
						<div class="input-group">
							<span class="input-group-addon">Full Name:</span>
							{{ Form::text('name', $patient->name}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Sex:</span>
							{{ Form::text('sex', $patient->sex}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Address:</span>
							{{ Form::text('address', $patient->address}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Phone Number:</span>
							{{ Form::text('home_phone', $patient->home_phone}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Mobile Phone Number:</span>
							{{ Form::text('mobile_phone', $patient->mobile_phone}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Emergency Contact Phone:</span>
							{{ Form::text('emergency_phone', $patient->emergency_phone}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Allergies:</span>
							{{ Form::text('allergies', $patient->allergies}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Preferred Language:</span>
							{{ Form::text('preferred_language', $patient->preferred_language}}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Ethnic Background:</span>
							{{ Form::text('ethnic_background', $patient->ethnic_background}}
						</div>
					</fieldset>
				</div>
			{{Form::close}}
		</div>
	</div>
@stop
