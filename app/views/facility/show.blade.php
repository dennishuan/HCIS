@extends('layouts.default')

@section('content')

    <h1>Facility:</h1>

    <dl>
        <dt>Facility Abbrev.: </dt>
        <dd><div>{{ $facility->facility_abbrev }}</div></dd>

        <dt>Name: </dt>
        <dd><div>{{ $facility->facility_name }}</div></dd>

        <dt>Facility Type: </dt>
        <dd><div>{{ $facility->facilitytype }}</div></dd>

        <dt>Phone: </dt>
        <dd><div>{{ $facility->phone }}</div></dd>

        <dt>Address: </dt>
        <dd><div>{{ $facility->address }}</div></dd>

        <dt>Postal Code: </dt>
        <dd><div>{{ $facility->postal_code }}</div></dd>
    </dl>

    <nav>
        {{ link_to_route('facility.index', 'Index', [], ['class' => 'btn btn-info']) }}
        |
        {{ link_to_route('facility.edit', 'Edit', [$facility->id], ['class' => 'btn btn-info']) }}
        |
        {{ Form::open(['route' => ['facility.destroy', $facility->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {{ Form::close() }}
    </nav>

@stop
