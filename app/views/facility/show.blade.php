@extends('layouts.master')

@section('content')

	<div id="Facility" class="tab-pane fade in active container">
		<h1>Create Facility</h1>
		<div class="row">
			{{ Form::open(['route' => 'facility.store']) }}
			
			<!-- Left side of form -->
				<div class="col col-md-6 col-lg-6">
					<fieldset disabled>
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
					</fieldset>
				</div>
			{{Form::close}}
		</div>
	</div>
	
    <nav>
        {{ link_to_route('facility.index', 'Index', [], ['class' => 'btn btn-info']) }}
        |
        {{ link_to_route('facility.edit', 'Edit', [$facility->id], ['class' => 'btn btn-info']) }}
        |
        {{ Form::open(['route' => ['facility.destroy', $facility->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {{ Form::close() }}
    </nav>

@stop
