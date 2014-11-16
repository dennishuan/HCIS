@extends('layouts.default')

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
            <dt>{{ Form::label('type', 'Type: ') }}</dt>
            <dd><div>{{ Form::input('enum', 'Type') }}
                {{ $errors->first('preferred_name') }}</div></dd>
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
