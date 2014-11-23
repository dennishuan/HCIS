@extends('layouts.master')

@section('content')
<div id="PatientRecord" class="tab-pane fade in active container">
  <h1> Edit: {{$record->patient->name}}'s Record </h1>
  <div class="row">
    {{ Form::model($record, ['method'=>'PUT', 'route'=>['record.update', $record->id]]) }}

    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6">
      <div class="input-group">
        <span class="input-group-addon">Legal Name:</span>
        {{ Form::text('name', $record->patient->name, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('name') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Sex:</span>
        {{ Form::select('sex', array(' ' => ' ', 'male' => 'Male', 'female' => 'Female'),
        $record->patient->sex, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('sex') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Address:</span>
        {{ Form::text('address', $record->patient->address, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('address') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Home Phone:</span>
        {{ Form::text('home_phone', $record->patient->home_phone, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('home_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Mobile Phone:</span>
        {{ Form::text('mobile_phone', $record->patient->mobile_phone, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('mobile_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Emergency Contact Phone:</span>
        {{ Form::text('emergency_phone', $record->patient->emergency_phone, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('emergency_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Allergies:</span>
        {{ Form::text('allergies', $record->patient->allergies, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('allergies') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Preferred Language:</span>
        {{ Form::text('preferred_language', $record->patient->preferred_language, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('preferred_language') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Ethnic Background:</span>
        {{ Form::text('ethnic_background', $record->patient->ethnic_background, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('ethnic_background') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Priority:</span>
        {{ Form::select('priority', array(' '=>' ','1'=>'1','2'=>'2','3'=>'3','4'=>'4',
        '5'=>'5','6'=>'6'), $record->patient->priority ,['class' => 'form-control']) }}
      </div>
      {{ $errors->first('priority') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Admittance Date:</span>
        {{ Form::text('admit_datetime', $record->admit_datetime, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('admit_datetime') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Arrival Mode:</span>
        {{ Form::text('arrival_mode', $record->arrival_mode, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('arrival_mode') }}
    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6">

      <div class="input-group">
        <span class="input-group-addon">Personal Health Number:</span>
        {{ Form::text('phn', $record->patient->phn, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('phn') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Preferred Name:</span>
        {{ Form::text('preferred_name', $record->patient->preferred_name, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('preferred_name') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Date of Birth:</span>
        {{ Form::text('date_of_birth', $record->patient->date_of_birth, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('date_of_birth') }}


      <div class="input-group buffer">
        <span class="input-group-addon">Postal Code:</span>
        {{ Form::text('postal_code', $record->patient->postal_code, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('phn') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Work Phone:</span>
        {{ Form::text('work_phone', $record->patient->work_phone, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('work_phone') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Emergency Contact Name:</span>
        {{ Form::text('emergency_name', $record->patient->emergency_name, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('emergency_name') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Emergency Contract Relationship:</span>
        {{ Form::text('emergency_relationship', $record->patient->emergency_relationship, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('emergency_relationship') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Permanent Resident:</span>
        {{ Form::select('permanent_resident', array(' ' => ' ', '1' => 'Yes', '0' => 'No'),
        $record->patient->permanent_resident, ['class' => 'form-control'])}}
      </div>
      {{ $errors->first('permanent_resident') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Preferred Language:</span>
        {{ Form::text('preferred_language', $record->patient->preferred_language, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('preferred_language') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Doctor:</span>
        {{ Form::text('family_doctor', $record->patient->family_doctor, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('family_doctor') }}


      <div class="input-group buffer">
        <span class="input-group-addon">Registration Date:</span>
        {{ Form::text('reg_datetime', $record->reg_datetime, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('reg_datetime') }}


      <div class="input-group buffer">
        <span class="input-group-addon">Chief Complaint Code:</span>
        {{ Form::text('chief_compl_code', $record->chief_compl_code, ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('chief_compl_code') }}

    </div>

    <!-- Text Fields -->
    <div class="col col-md-12 col-lg-12">
      <div class="input-group buffer">
        <span class="input-group-addon">Stated Complaint:</span>
        {{ Form::textarea('stated_complaint', $record->stated_complaint, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('stated_complaint') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Cheif Complaint:</span>
        {{ Form::textarea('chief_complaint', $record->chief_complaint, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('chief_complaint') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Subjective:</span>
        {{ Form::textarea('subjective', $record->subjective, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('subjective') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Objective:</span>
        {{ Form::textarea('objective', $record->objective, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('objective') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Assessment:</span>
        {{ Form::textarea('assessment', $record->assessment, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('assessment') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Prescription:</span>
        {{ Form::textarea('prescription', $record->prescription, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('prescription') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Remarks:</span>
        {{ Form::textarea('remarks', $record->remarks, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('remarks') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Plan:</span>
        {{ Form::textarea('plan', $record->plan, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('plan') }}
    </div>


    <!-- Buttons -->
    <div class="col col-md-6 col-lg-6">
      <div class="input-group buffer">
        {{Form::submit('Make Changes', ['class' => 'btn btn-info'])}}
      </div>
    </div>
    {{ Form::close() }}
  </div>
</div>
@stop
