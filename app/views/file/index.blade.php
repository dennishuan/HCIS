@extends('layouts/master')

@section('content')
	
	{{ Form::open(array('url'=>'loadfile', 'files'=>true)) }}

	{{ Form::label('file', 'Load File', array('id'=>'','class'=>'')) }}
	{{ Form::file('file','',array('id'=>'','class'=>'')) }}
	{{ $errors->first() }}
	<br/>

	{{ Form::submit('Upload') }}
	{{ Form::reset('Reset') }}

	{{ Form::close() }}

@stop
