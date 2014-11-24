@extends('layouts.master')

@section('content')
<div id="PatientRecord" class="tab-pane fade in active container">
  <h1> Edit: {{$record->patient->name}}'s Record </h1>
  <div class="row">
    {{ Form::model($record, ['method'=>'PUT', 'route'=>['record.update', $record->id]]) }}

    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6">
        <div class="input-group">
          <span class="input-group-addon">Facility Abbrev.:</span>
          {{ Form::text('abbrev', $record->facility->abbrev, ['class' => 'form-control', 'readOnly' => 'true']) }}
        </div>
        {{ $errors->first('abbrev') }}
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
          {{ Form::text('phn', $record->patient->phn, ['class' => 'form-control', 'readOnly' => 'true']) }}
        </div>
        {{ $errors->first('phn') }}


        <div class="input-group buffer">
          <span class="input-group-addon">Doctor:</span>
          {{ Form::text('username', $record->user->username, ['class' => 'form-control', 'readOnly' => 'true']) }}
        </div>
        {{ $errors->first('username') }}

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
        {{ Form::textarea('stated_compl', $record->stated_complaint, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('stated_compl') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Cheif Complaint:</span>
        {{ Form::textarea('chief_compl', $record->chief_complaint, ['class' => 'form-control', 'rows' => '3']) }}
      </div>
      {{ $errors->first('chief_compl') }}

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
