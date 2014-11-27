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
        {{ Form::text('name', $facility->name, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('name')}}

      <div class="input-group buffer">
        <span class="input-group-addon">Type:</span>
        {{ Form::select('type', array(' ' => ' ', 'Hospital' => 'Hospital', 'Clinic' => 'Clinic'),
        $facility->type, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('type')}}

      <div class="input-group buffer">
        <span class="input-group-addon">Address:</span>
        {{ Form::text('address', $facility->address, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('address')}}

      <div class="input-group buffer">
        {{ Form::submit('Make Changes', ['class' => 'btn btn-info'])}}
      </div>
    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6">
      <div class="input-group">
        <span class="input-group-addon">Facility Abbrev.:</span>
        {{ Form::text('abbrev', $facility->abbrev, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('abbrev')}}

      <div class="input-group buffer">
        <span class="input-group-addon">Phone Number:</span>
        {{ Form::text('phone', $facility->phone, ['class' => 'form-control', 'required']) }}

        <span class="input-group-addon">Fax Number:</span>
        {{ Form::text('fax', $facility->fax, ['class' => 'form-control', 'required']) }}

      </div>
      {{ $errors->first('phone')}}
      {{ $errors->first('fax')}}

      <div class="input-group buffer">
        <span class="input-group-addon">Postal Code:</span>
        {{ Form::text('postal_code', $facility->postal_code, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('postal_code')}}
    </div>
    {{ Form::close() }}
  </div>
</div>
@stop
