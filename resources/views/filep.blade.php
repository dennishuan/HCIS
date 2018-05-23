@extends('layouts/master')

@section('content')

	<h1>Please Select Patient Import File</h1>

	<div>
	{!! Form::open(array('url'=>'uploadPat', 'files'=>true)) !!}

	{!! Form::label('file', '', array('id'=>'','class'=>'')) !!}
	{!! Form::file('file','',array('id'=>'','class'=>'')) !!}
	{!! $errors->first() !!}
	<br/>
	{!! Form::submit('Upload') !!}
	{!! Form::reset('Reset') !!}

	{!! Form::close() !!}
	</div>

@stop
