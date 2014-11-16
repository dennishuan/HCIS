@extends('layouts.default')

@section('content')

    <h1>User:</h1>

    <dl>
        <dt>Username:</dt>
        <dd><div>{{ $user->username }}</div></dd>

        <!-- Admin shouldn't see password--
        <dt>Password:</dt>
        <dd><div>{{ $user->password }}</div></dd>
        -->

        <dt>Type:</dt>
        <dd><div>{{ $user->type }}</div></dd>

        <dt>Name:</dt>
        <dd><div>{{ $user->name }}</div></dd>

        <dt>Email:</dt>
        <dd><div>{{ $user->email }}</div></dd>

        <dt>Phone Number:</dt>
        <dd><div>{{ $user->phone }}</div></dd>

    </dl>

    <nav>
        {{ link_to_route('user.index', 'Index', [], ['class' => 'btn btn-info']) }}
        |
        {{ link_to_route('user.edit', 'Edit', [$user->id], ['class' => 'btn btn-info']) }}
        |
        {{ Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {{ Form::close() }}
    </nav>

@stop


