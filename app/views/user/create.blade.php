@extends('layouts/default')

@section('content')

    {{ Form::open(['route' => 'user.store'])}}
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
            {{ Form::submit() }}
        </ul>
    {{ Form::close() }}
@stop
