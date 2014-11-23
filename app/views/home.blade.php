@extends('layouts/master')

@section('navbar')

{{Form::open(['route'=>'patient.search', 'class' => "navbar-form navbar-left"])}}
<div class="form-group">
  {{Form::text('keyword', null, ['placeholder' => 'Search for Record by PHN',  'class' => 'form-control', 'size' => '25'])}}
  {{Form::submit('Search', ['class' => 'btn btn-default'])}}
</div>
{{Form::close()}}

@stop

@section('content')

Welcome to Home page.


@stop
