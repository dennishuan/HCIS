@extends('layouts.master')

@section('content')
    <h1> Edit User</h1>

    {{ Form::model($user, ['method'=>'PUT', 'route'=>['facility.user.update', $id, $user->id]]) }}

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
            {{ Form::submit('Edit User', ['class' => 'btn btn-info'])}}
        </div>

    {{ Form::close() }}
@stop
