@extends('layouts.master')

@section('content')
<div id="Patient" class="tab-pane fade in active container">
  <h1>Create Record</h1>
  <div class="row">
    {{ Form::open(['route' => 'record.store']) }}
    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6">
      <div class="input-group">
        <span class="input-group-addon">Facility Abbrev.:</span>
        {{ Form::text('abbrev', null, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('abbrev') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Priority:</span>
        {{ Form::select('priority', array(' '=>' ','1'=>'1','2'=>'2','3'=>'3','4'=>'4',
        '5'=>'5','6'=>'6'), ' ',['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('priority') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Admittance Date:</span>
        {{ Form::text('admit_datetime', null, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('admit_datetime') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Arrival Mode:</span>
        {{ Form::text('arrival_mode', '', ['class' => 'form-control']) }}
      </div>
      {{ $errors->first('arrival_mode') }}

    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6"><div class="input-group">
      <span class="input-group-addon">Personal Health Number:</span>
      {{ Form::text('phn', null, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('phn') }}


      <div class="input-group buffer">
        <span class="input-group-addon">Doctor username:</span>
        {{ Form::text('username', null, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('username') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Registration Date:</span>
        {{ Form::text('reg_datetime', null, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('reg_datetime') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Chief Complaint Code:</span>
        {{ Form::text('chief_compl_code', null, ['class' => 'form-control', 'required']) }}
      </div>
      {{ $errors->first('chief_compl_code') }}

    </div>

    <!-- Text Fields -->

    <div class="col col-md-12 col-lg-12">
      <div class="input-group buffer">
        <span class="input-group-addon">Stated Complaint:</span>
        {{ Form::textarea('stated_compl', null, ['class' => 'form-control', 'rows' => '3', 'required']) }}
      </div>
      {{ $errors->first('stated_compl') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Cheif Complaint:</span>
        {{ Form::textarea('chief_compl', null, ['class' => 'form-control', 'rows' => '3', 'required']) }}
      </div>
      {{ $errors->first('chief_compl') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Subjective:</span>
        {{ Form::textarea('subjective', null, ['class' => 'form-control', 'rows' => '3', 'required']) }}
      </div>
      {{ $errors->first('subjective') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Objective:</span>
        {{ Form::textarea('objective', null, ['class' => 'form-control', 'rows' => '3', 'required']) }}
      </div>
      {{ $errors->first('objective') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Assessment:</span>
        {{ Form::textarea('assessment', null, ['class' => 'form-control', 'rows' => '3', 'required']) }}
      </div>
      {{ $errors->first('assessment') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Prescription:</span>
        {{ Form::textarea('prescription', null, ['class' => 'form-control', 'rows' => '3', 'required']) }}
      </div>
      {{ $errors->first('prescription') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Remarks:</span>
        {{ Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '3', 'required']) }}
      </div>
      {{ $errors->first('remarks') }}

      <div class="input-group buffer">
        <span class="input-group-addon">Plan:</span>
        {{ Form::textarea('plan', null, ['class' => 'form-control', 'rows' => '3', 'required']) }}
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
