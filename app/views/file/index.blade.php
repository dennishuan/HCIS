@extends('layouts/default')

@section('content')
	{{ Form::open(array('url'=>'loadfile', 'files'=>true)) }}


	{{ Form::label('file', 'File', array('id'=>'','class'=>'')) }}
	{{ Form::file('file','',array('id'=>'','class'=>'')) }}
	{{ $errors->first() }}
	<br/>

	{{ Form::submit('Load') }}
	{{ Form::reset('Reset') }}

	{{ Form::close() }}

@stop

