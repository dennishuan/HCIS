@extends('layouts.master')


@section('content')

<div id="User" class="tab-pane fade in active container">
  <h1>Editing User: {!! $user->name !!}</h1>
  <div class="row">
    {!! Form::model($user, ['method'=>'PUT', 'route'=>['user.update', $user->id]]) !!}

    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6">
      <div class="input-group">
        <span class="input-group-addon">Username:</span>
        {!! Form::text('username', $user->username, ['class' => 'form-control', 'required']) !!}
      </div>
      {!! $errors->first('username')!!}

      <div class="input-group buffer">
        <span class="input-group-addon">Name:</span>
        {!! Form::text('name', $user->name, ['class' => 'form-control', 'required'])!!}
      </div>
      {!! $errors->first('name')!!}

      <div class="input-group buffer">
        <span class="input-group-addon">Phone Number:</span>
        {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'required'])!!}
      </div>
      {!! $errors->first('phone')!!}

      <div class="input-group buffer">
        {!! Form::submit('Make Changes', ['class' => 'btn btn-info'])!!}
      </div>
    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6">
      @if(Auth::user() != null && Auth::user()->isAdmin())
      <div class="input-group">
        <span class="input-group-addon">Type:</span>
        {!! Form::select('type', array('Admin' => 'Admin', 'Doctor' => 'Doctor', 'Nurse' => 'Nurse'),
        $user->type, ['class' => 'form-control', 'required'])!!}
      </div>
      {!! $errors->first('type')!!}
      @else
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Type:</span>
          {!! Form::text('type', $user->type, ['class' => 'form-control', 'required'])!!}
        </div>
        {!! $errors->first('type')!!}
      </fieldset>
      @endif

      <div class="input-group buffer">
        <span class="input-group-addon">Email:</span>
        {!! Form::email('email', $user->email, ['class' => 'form-control', 'required'])!!}
      </div>
      {!! $errors->first('email')!!}
    </div>
    {!! Form::close()!!}
  </div>
</div>

@stop


