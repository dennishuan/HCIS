@extends('layouts/default')

@section('content')

       <li>{{ $patient->first_name }}</li>
       
       <div>
	{{ HTML::image($photo->image) }}
       </div

@stop
