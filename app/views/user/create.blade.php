@extends('layouts.master')

@section('navbar')

{{Form::open(['route'=>'user.search', 'class' => "navbar-form navbar-left form-inline"])}}
<div class="form-group">
{{Form::text('keyword', null, ['placeholder' => 'Search for Username',  'class' => 'form-control', 'size' => '25'])}}
  </div>
{{Form::submit('Search', ['class' => 'btn btn-default'])}}
{{ link_to_route('user.create', 'new User', [], ['class' => 'btn btn-info']) }}

{{Form::close()}}

@stop

@section('content')
    <h1> Create New User</h1>

    {{ Form::open(['route' => 'user.store']) }}

        <div>
            <dt>{{ Form::label('username', 'Username: ') }}</dt>
            <dd><div>{{ Form::text('username' ) }}
                {{ $errors->first('username') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('password', 'Password: ') }}</dt>
            <dd><div>{{ Form::password('password') }}
                {{ $errors->first('password') }}</div></dd>
       </div>

        <div>
            <dt>{{ Form::label('password_confirmation', 'Confirm Password: ') }}</dt>
            <dd><div>{{ Form::password('password_confirmation') }}
                {{ $errors->first('password') }}</div></dd>
       </div>

        <div>
            <dt>{{ Form::label('type', 'Type: ') }}</dt>
            <dd><div>{{ Form::select('Type', array(' ' => ' ', 'admin' => 'admin', 'doctor' => 'doctor', 'nurse' => 'nurse'), ' ') }}
                {{ $errors->first('type') }}</div></dd>
       </div>

        <div>
            <dt>{{ Form::label('name', 'Name: ') }}</dt>
            <dd><div>{{ Form::text('name' ) }}
                {{ $errors->first('name') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('email', 'Email: ') }}</dt>
            <dd><div>{{ Form::text('email' ) }}
                {{ $errors->first('email') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('phone', 'Phone Number: ') }}</dt>
            <dd><div>{{ Form::text('phone' ) }}
                {{ $errors->first('phone') }}</div></dd>
        </div>

        <div>
            {{ Form::submit('Create User', ['class' => 'btn btn-info'])}}
        </div>

    {{ Form::close() }}
@stop

