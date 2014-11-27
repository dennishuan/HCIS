@extends('layouts.master')


@section('content')

<div class="container">
  <h1>Change Password: {{ $user->name }}</h1>
  <div class="row">
    <div class="col col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">

      {{ Form::open(['method'=>'POST', 'route'=>['user.updatePassword', $user->id]]) }}

      @if(Auth::user()->getId($user->id))
      <div class="input-group buffer">
        <span class="input-group-addon">Current Password:</span>
        {{ Form::password('current_password', ['class' => 'form-control', 'required'])}}
      </div>
      {{ $errors->first('current_password')}}
      @else
      <div class="input-group buffer">
        <span class="input-group-addon">Admin Password:</span>
        {{ Form::password('current_password', ['class' => 'form-control', 'required'])}}
      </div>
      {{ $errors->first('current_password')}}
      @endif

      @if(Auth::user()->getId($user->id) || Auth::user()->isAdmin())
      <div class="input-group buffer">
        <span class="input-group-addon">New Password:</span>
        {{ Form::password('password', ['class' => 'form-control', 'required'])}}
      </div>
      {{ $errors->first('password')}}

      <div class="input-group buffer">
        <span class="input-group-addon">Confirm Password:</span>
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'required'])}}
      </div>

      <div class="input-group buffer">
        {{ Form::submit('Make Changes', ['class' => 'btn btn-info'])}}
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>

@endif


@stop
