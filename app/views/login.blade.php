@extends('layouts/default')

@section('content')

    {{ Form::open(['route' => 'login.store'])}}
        <ul>
            <li>
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username') }}
                {{ $errors->first('username') }}
            </li>
            <li>
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
                {{ $errors->first('password') }}
            </li>
            {{ Form::submit('login') }}
        </ul>
    {{ Form::close() }}
    
    <p>username: admin</p>
    
    <p>password: admin</p>
@stop
