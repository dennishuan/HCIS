@extends('layouts/master')

@section('content')
{{ $cal->generate() }}
@stop