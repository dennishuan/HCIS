@extends('layouts.master')

@section('content')
  <div id="Facility" class="tab-pane fade in active container">
    <h1>Create Facility</h1>
    <div class="row">
      {{ Form::open(['route' => 'facility.store']) }}

      <!-- Left side of form -->
        <div class="col col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">Facility Name:</span>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {{ $errors->first('name') }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Type:</span>
            {{ Form::select('type', array(' ' => ' ', 'hospital' => 'Hospital', 'clinic' => 'Clinic'), 
               ' ', ['class' => 'form-control']) }}
            {{ $errors->first('type') }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Address:</span>
            {{ Form::text('phone', null, ['class' => 'form-control']) }}
            {{ $errors->first('phone') }}
          </div>

          <div class="input-group buffer">
            {{ Form::submit('Create Facility')}}
          </div>
        </div>

        <!-- Right side of form -->
        <div class="col col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">Facility Abbrev.:</span>
            {{ Form::text('abbrev', null, ['class' => 'form-control']) }}
            {{ $errors->first('abbrev') }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Phone Number:</span>
            {{ Form::text('phone', null, ['class' => 'form-control']) }}
            {{ $errors->first('phone') }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Postal Code:</span>
            {{ Form::text('postal_code', null, ['class' => 'form-control']) }}
            {{ $errors->first('postal_code') }}
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
@stop
