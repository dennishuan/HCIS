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
      </div>
      {{ $errors->first('phn') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Preferred Name:</span>
        {{ Form::text('preferred_name', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('preferred_name') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Postal Code:</span>
        {{ Form::text('postal_code', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('postal_code') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Date of Birth:</span>
        {{ Form::text('date_of_birth', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('date_of_birth') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Work Phone Number:</span>
        {{ Form::text('work_phone', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('work_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Email:</span>
        {{ Form::text('email', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('email') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Emergency Contact Phone:</span>
        {{ Form::text('emergency_phone', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('emergency_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Allergies:</span>
        {{ Form::text('allergies', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('allergies') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Preferred Language:</span>
        {{ Form::text('preferred_language', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('preferred_language') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Ethnic Background:</span>
        {{ Form::text('ethnic_background', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('ethnic_background') }}

      <div class="input-group buffer">
        {{ Form::submit('Create Patient', ['class' => 'btn btn-info'])}}
      </div>
    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6">
      <div class="input-group">
        <span class="input-group-addon">Full Name:</span>
        {{ Form::text('name', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('name') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Sex:</span>
        {{ Form::select('sex', array(' ' => ' ', 'male' => 'Male', 'female' => 'Female'),
        ' ', ['class' => 'form-control'])}}
      </div>
      {{ $errors->first('sex') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Address:</span>
        {{ Form::text('address', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('address') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Phone Number:</span>
        {{ Form::text('home_phone', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('home_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Mobile Phone Number:</span>
        {{ Form::text('mobile_phone', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('mobile_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Emergency Contact Name:</span>
        {{ Form::text('emergency_name', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('emergency_name') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Emergency Contact Relationship:</span>
        {{ Form::text('emergency_relationship', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('emergency_relationship') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Permanent Resident:</span>
        {{ Form::select('permanent_resident', array(' ' => ' ', '1' => 'Yes', '0' => 'No'),
        ' ', ['class' => 'form-control'])}}
      </div>
      {{ $errors->first('permanent_resident') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Other Language:</span>
        {{ Form::text('other_language', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('other_language') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Family Doctor:</span>
        {{ Form::text('family_doctor', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('family_doctor') }}

    </div>
    {{ Form::close() }}
  </div>
</div>
@stop
