@extends('layouts.master')


@section('content')

  <div id="User" class="tab-pane fade in active container">
    <h1>Edit: {{ $user->name }}</h1>
    <div class="row">
      {{ Form::model($user, ['method'=>'PUT', 'route'=>['user.update', $user->id]]) }}

      <!-- Left side of form -->
        <div class="col col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">Username:</span>
            {{ Form::text('username', $user->username, ['class' => 'form-control']) }}
            {{ $errors->first('username')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Name:</span>
            {{ Form::text('name', $user->name, ['class' => 'form-control'])}}
            {{ $errors->first('name')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Phone Number:</span>
            {{ Form::text('phone', $user->phone, ['class' => 'form-control'])}}
            {{ $errors->first('phone')}}
          </div>

          <div class="input-group buffer">
            {{ Form::submit('Make Changes', ['class' => 'btn btn-info'])}}
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
            <span class="input-group-addon">Confirm Password:</span>
            {{ Form::password('password_confirmation', ['class' => 'form-control'])}}
            {{ $errors->first('password')}}
          </div>
            
          <div class="input-group buffer">
            <span class="input-group-addon">Type:</span>
            {{ Form::select('type', array(' ' => ' ', 'admin' => 'Admin', 'doctor' => 'Doctor', 'nurse' => 'Nurse'), 
               $user->type, ['class' => 'form-control'])}}
            {{ $errors->first('type')}}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Email:</span>
            {{ Form::text('email', $user->email, ['class' => 'form-control'])}}
            {{ $errors->first('email')}}
          </div>
        </div>
      {{ Form::close()}}
    </div>
  </div>

@stop


