@extends('layouts.default')

@section('content')

    <h1>User:</h1>

    <dl>
        <dt>Notes</dt>
        <dd><div>{{ $user->notes }}</div></dd>

        <dt>Full Name:</dt>
        <dd><div>{{ $user->name }}</div></dd>

        <dt>Preferred Name:</dt>
        <dd><div>{{ $user->preferred_name }}</div></dd>

        <dt>Sex:</dt>
        <dd><div>{{ $user->sex }}</div></dd>

        <dt>Date of Birth:</dt>
        <dd><div>{{ $user->date_of_birth }}</div></dd>

        <dt>Address:</dt>
        <dd><div>{{ $user->address }}</div></dd>

        <dt>Postal Code:</dt>
        <dd><div>{{ $user->postal_code }}</div></dd>

        <dt>Home Phone:</dt>
        <dd><div>{{ $user->home_phone }}</div></dd>

        <dt>Work Phone:</dt>
        <dd><div>{{ $user->work_phone }}</div></dd>

        <dt>Mobile Phone:</dt>
        <dd><div>{{ $user->mobile_phone }}</div></dd>

        <dt>Emergency Contact Name:</dt>
        <dd><div>{{ $user->emergency_name }}</div></dd>

        <dt>Emergency Contact Phone Number:</dt>
        <dd><div>{{ $user->emergency_phone }}</div></dd>

        <dt>Emergency Contact Relationship:</dt>
        <dd><div>{{ $user->emergency_relationship }}</div></dd>

        <dt>Allergies:</dt>
        <dd><div>{{ $user->allergies }}</div></dd>

        <dt>Permanent Resident:</dt>
        <dd><div>{{ $user->permanent_resident }}</div></dd>

        <dt>Preferred Language:</dt>
        <dd><div>{{ $user->preferred_language }}</div></dd>

        <dt>Other Language:</dt>
        <dd><div>{{ $user->other_language }}</div></dd>

        <dt>Ethnic Background:</dt>
        <dd><div>{{ $user->ethnic_background }}</div></dd>

        <dt>Family Doctor:</dt>
        <dd><div>{{ $user->family_doctor }}</div></dd>
    </dl>

    <nav>
        {{ link_to_route('facility.user.index', 'Index', [$facility_id], ['class' => 'btn btn-info']) }}
        |
        {{ link_to_route('facility.user.edit', 'Edit', [$facility_id, $user->id], ['class' => 'btn btn-info']) }}
        |
        {{ Form::open(['route' => ['facility.user.destroy', $facility_id, $user->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {{ Form::close() }}
    </nav>

@stop
