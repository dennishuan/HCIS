@extends('layouts.master')

@section('content')
  <div id="Facility" class="tab-pane fade in active container">
    <h1>Edit: {{ $facility->name }}</h1>
    <div class="row">
      {{ Form::model($facility, ['method'=>'PUT', 'route'=>['facility.update', $facility->id]]) }}
      <!-- Left side of form -->
        <div class="col col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">Facility Name:</span>
            {{ Form::text('name', $facility->name, ['class' => 'form-control']) }}
            {{ $errors->first('name')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Type:</span>
            {{ Form::select('type', array(' ' => ' ', 'hospital' => 'Hospital', 'clinic' => 'Clinic'), 
               $facility->type, ['class' => 'form-control']) }}
            {{ $errors->first('type')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Address:</span>
            {{ Form::text('phone', $facility->phone, ['class' => 'form-control']) }}
            {{ $errors->first('phone')}}
          </div>

          <div class="input-group buffer">
            {{ Form::submit('Make Changes', ['class' => 'btn btn-info'])}}
          </div>
        </div>

        <!-- Right side of form -->
        <div class="col col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">Facility Abbrev.:</span>
            {{ Form::text('abbrev', $facility->abbrev, ['class' => 'form-control']) }}
            {{ $errors->first('abbrev')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Phone Number:</span>
            {{ Form::text('phone', $facility->phone, ['class' => 'form-control']) }}
            {{ $errors->first('phone')}}
            <span class="input-group-addon">Fax Number:</span>
            {{ Form::text('fax', $facility->fax, ['class' => 'form-control']) }}
            {{ $errors->first('fax')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Postal Code:</span>
            {{ Form::text('postal_code', $facility->postal_code, ['class' => 'form-control']) }}
            {{ $errors->first('postal_code')}}
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
@stop
