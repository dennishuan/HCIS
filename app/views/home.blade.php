@extends('layouts/default')

@section('content')

<h2>{{ link_to('patient', 'GotoPatientList') }}<h2>


{{ Form::open(['route' => 'login.destroy']) }}
{{ Form::submit('Logout') }}
{{ Form::close() }}

@stop
