@extends('layouts.master')


@section('content')
  <div id="User" class="tab-pane fade in active container">
    <h1>Create User</h1>
    <div class="row">
      {{ Form::open(['route' => 'user.store']) }}

      <!-- Left side of form -->
        <div class="col col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">Username:</span>
            {{ Form::text('username', null, ['class' => 'form-control'])}}
            {{ $errors->first('username')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Name:</span>
            {{ Form::text('name', null, ['class' => 'form-control'])}}
            {{ $errors->first('name')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Phone Number:</span>
            {{ Form::text('phone', null, ['class' => 'form-control'])}}
            {{ $errors->first('phone')}}
          </div>

          <div class="input-group buffer">
            {{ Form::submit('Create User', ['class' => 'btn btn-info'])}}
          </div>
        </div>

        <!-- Right side of form -->
        <div class="col col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">Password:</span>
            {{ Form::password('password', ['class' => 'form-control'])}}
            {{ $errors->first('password')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Type:</span>
            {{ Form::select('type', array(' ' => ' ', 'admin' => 'Admin', 'doctor' => 'Doctor', 'nurse' => 'Nurse'), 
               ' ', ['class' => 'form-control'])}}
            {{ $errors->first('type')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Email:</span>
            {{ Form::text('email', null, ['class' => 'form-control'])}}
            {{ $errors->first('email')}}
          </div>
        </div>
      {{ Form::close()}}
    </div>
  </div>
@stop

