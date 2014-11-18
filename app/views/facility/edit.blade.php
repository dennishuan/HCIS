@extends('layouts.master')

@section('content')
	<div id="Facility" class="tab-pane fade in active container">
		<h1>Create Facility</h1>
		<div class="row">
			{{ Form::model($facility, ['method'=>'PUT', 'route'=>['facility.update', $facility->id]])}}
			
			<!-- Left side of form -->
				<div class="col col-md-6 col-lg-6">
					<div class="input-group">
						<span class="input-group-addon">Facility Name:</span>
						{{ Form::text('name'}}
						{{ $errors->first('name')}}
					</div>
					
					<!-- NOTE TYPE IS NOT AN ENUM -->
					<div class="input-group buffer">
						<span class="input-group-addon">Type:</span>
						{{ Form::text('type'}}
						{{ $errors->first('type')}}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Address:</span>
						{{ Form::text('phone'}}
						{{ $errors->first('phone')}}
					</div>
					{{ Form::submit('Create Facility', ['class' => 'btn btn-info'])}}
				</div>
				
				<!-- Right side of form -->
				<div class="col col-md-6 col-lg-6">	
					<div class="input-group">
						<span class="input-group-addon">Facility Abbrev.:</span>
						{{ Form::text('abbrev'}}
						{{ $errors->first('abbrev')}}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Phone Number:</span>
						{{ Form::text('phone'}}
						{{ $errors->first('phone')}}
					</div>
					
					<div class="input-group buffer">
						<span class="input-group-addon">Postal Code:</span>
						{{ Form::text('postal_code'}}
						{{ $errors->first('postal_code')}}
					</div>
				</div>
			{{Form::close}}
		</div>
	</div>
@stop
