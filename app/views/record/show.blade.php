@extends('layouts.master')

@section('content')
	<div id="PatientRecord" class="tab-pane fade in active container">
		<h1> {{$recond->patient()->phn}} </h1>
		<div class="row">
			{{ Form::open(['route' => 'record.store', 'method' => 'POST']) }}
			
			<!-- Left side of form -->
				<div class="col col-md-6 col-lg-6">
					<fieldset disabled>
						<div class="input-group">
							<span class="input-group-addon">Legal Name:</span>
							{{ Form::text('name', $record->name, ['class' => 'form-control']) }}
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Sex:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Address:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Home Phone:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Moble Phone:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Emergency Contact Phone:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Allergies:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Preferred Language:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Ethnic Background:</span>
						</div>
					</fieldset>
				</div>
				
				<!-- Right side of form -->
				<div class="col col-md-6 col-lg-6">	
					<fieldset disabled>
						<div class="input-group">
							<span class="input-group-addon">Preferred Name:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Date of Birth:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Postal Code:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Work Phone:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Emergency Contact NAme:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Emergency Contract Relationship:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Permanent Resident:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Preferred Language:</span>
						</div>
						
						<div class="input-group buffer">
							<span class="input-group-addon">Doctor:</span>
						</div>
					</fieldset>
				</div>
				
				<!-- Text Fields -->

				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="subjective">Subjective</label>
					</div>
					<textarea class="form-control" rows="3" id="subjective" placeholder="Subjective"
					disabled></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="objective">Objective</label>
					</div>
					<textarea class="form-control" rows="3" id="objective" placeholder="Objective"
					disabled></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="assessment">Assessment</label>
					</div>
					<textarea class="form-control" rows="3" id="assessment" placeholder="Assessment"
					disabled></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="prescription">Prescription</label>
					</div>
					<textarea class="form-control" rows="3" id="prescription" placeholder="Prescription"
					disabled></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="remarks">Remarks</label>
					</div>
					<textarea class="form-control" rows="3" id="remarks" placeholder="Remarks"
					disabled></textarea>
				</div>
				
				<div class="col col-md-12 col-lg-12">
					<div class="input-group buffer">
						<label for="plan">Plan</label>
					</div>
					<textarea class="form-control" rows="3" id="plan" placeholder="Plan"
					disabled></textarea>
				</div>
				
				
				<!-- Buttons -->
				<div class="col col-md-6 col-lg-6">
					<div class="input-group buffer">
						<nav>
							{{ link_to_route('record.index', 'Index', [], ['class' => 'btn btn-info']) }}
							|
							{{ link_to_route('record.edit', 'Edit', [$record->id], ['class' => 'btn btn-info']) }}
							|
							{{ Form::open(['route' => ['record.destroy', $record->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
								{{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
							{{ Form::close() }}
						</nav>
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop
