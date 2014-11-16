@extends('layouts.default')

@section('content')

    <h1>Facility:</h1>

    <dl>
        <dt>facility_name:</dt>
        <dd><div>{{ $facility->facility_name }}</div></dd>

        <dt>Full Name:</dt>
        <dd><div>{{ $facility->name }}</div></dd>

        <dt>Preferred Name:</dt>
        <dd><div>{{ $facility->preferred_name }}</div></dd>

        <dt>Sex:</dt>
        <dd><div>{{ $facility->sex }}</div></dd>

        <dt>Date of Birth:</dt>
        <dd><div>{{ $facility->date_of_birth }}</div></dd>

        <dt>Address:</dt>
        <dd><div>{{ $facility->address }}</div></dd>

        <dt>Postal Code:</dt>
        <dd><div>{{ $facility->postal_code }}</div></dd>

        <dt>Home Phone:</dt>
        <dd><div>{{ $facility->home_phone }}</div></dd>

        <dt>Work Phone:</dt>
        <dd><div>{{ $facility->work_phone }}</div></dd>

        <dt>Mobile Phone:</dt>
        <dd><div>{{ $facility->mobile_phone }}</div></dd>

        <dt>Emergency Contact Name:</dt>
        <dd><div>{{ $facility->emergency_name }}</div></dd>

        <dt>Emergency Contact Phone Number:</dt>
        <dd><div>{{ $facility->emergency_phone }}</div></dd>

        <dt>Emergency Contact Relationship:</dt>
        <dd><div>{{ $facility->emergency_relationship }}</div></dd>

        <dt>Allergies:</dt>
        <dd><div>{{ $facility->allergies }}</div></dd>

        <dt>Permanent Resident:</dt>
        <dd><div>{{ $facility->permanent_resident }}</div></dd>

        <dt>Preferred Language:</dt>
        <dd><div>{{ $facility->preferred_language }}</div></dd>

        <dt>Other Language:</dt>
        <dd><div>{{ $facility->other_language }}</div></dd>

        <dt>Ethnic Background:</dt>
        <dd><div>{{ $facility->ethnic_background }}</div></dd>

        <dt>Family Doctor:</dt>
        <dd><div>{{ $facility->family_doctor }}</div></dd>
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
