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
      </div>
      {{ $errors->first('name') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Sex:</span>
        {{ Form::select('sex', array(' ' => ' ', 'male' => 'male', 'female' => 'female'),
        ' ', ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('sex') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Address:</span>
        {{ Form::text('address', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('address') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Home Phone:</span>
        {{ Form::text('home_phone', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('home_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Mobile Phone:</span>
        {{ Form::text('mobile_phone', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('mobile_phone') }}

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
        <span class="input-group-addon">Priority:</span>
        {{ Form::select('priority', array(' '=>' ','1'=>'1','2'=>'2','3'=>'3','4'=>'4',
        '5'=>'5','6'=>'6'), ' ',['class' => 'form-control']) }}
      </div>
      {{ $errors->first('priority') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Admittance Date:</span>
        {{ Form::text('admit_datetime', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('admit_datetime') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Arrival Mode:</span>
        {{ Form::text('arrival_mode', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('arrival_mode') }}

    </div>

    <!-- Right side of form -->
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
        <span class="input-group-addon">Date of Birth:</span>
        {{ Form::text('date_of_birth', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('date_of_birth') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Postal Code:</span>
        {{ Form::text('postal_code', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('phn') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Work Phone:</span>
        {{ Form::text('work_phone', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('work_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Emergency Contact Name:</span>
        {{ Form::text('emergency_name', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('emergency_name') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Emergency Contract Relationship:</span>
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
        <span class="input-group-addon">Preferred Language:</span>
        {{ Form::text('preferred_language', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('preferred_language') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Doctor:</span>
        {{ Form::text('family_doctor', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('family_doctor') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Registration Date:</span>
        {{ Form::text('reg_datetime', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('reg_datetime') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Chief Complaint Code:</span>
        {{ Form::text('chief_compl_code', null, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('chief_compl_code') }}

    </div>

    <!-- Text Fields -->

    <div class="col col-md-12 col-lg-12">
      <div class="input-group buffer">
        <span class="input-group-addon">Stated Complaint:</span>
        {{ Form::textarea('stated_complaint', null, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('stated_complaint') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Cheif Complaint:</span>
        {{ Form::textarea('chief_complaint', null, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('chief_complaint') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Subjective:</span>
        {{ Form::textarea('subjective', null, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('subjective') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Objective:</span>
        {{ Form::textarea('objective', null, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('objective') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Assessment:</span>
        {{ Form::textarea('assessment', null, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('assessment') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Prescription:</span>
        {{ Form::textarea('prescription', null, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('prescription') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Remarks:</span>
        {{ Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('remarks') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Plan:</span>
        {{ Form::textarea('plan', null, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('plan') }}
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
