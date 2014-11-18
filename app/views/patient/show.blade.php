@extends('layouts.master')

@section('content')

    <h1>Patient:</h1>

    <dl>
        <dt>Personal Health Number:</dt>
        <dd><div>{{ $patient->phn }}</div></dd>

        <dt>Full Name:</dt>
        <dd><div>{{ $patient->name }}</div></dd>

        <dt>Preferred Name:</dt>
        <dd><div>{{ $patient->preferred_name }}</div></dd>

        <dt>Sex:</dt>
        <dd><div>{{ $patient->sex }}</div></dd>

        <dt>Date of Birth:</dt>
        <dd><div>{{ $patient->date_of_birth }}</div></dd>

        <dt>Address:</dt>
        <dd><div>{{ $patient->address }}</div></dd>

        <dt>Postal Code:</dt>
        <dd><div>{{ $patient->postal_code }}</div></dd>

        <dt>Home Phone:</dt>
        <dd><div>{{ $patient->home_phone }}</div></dd>

        <dt>Work Phone:</dt>
        <dd><div>{{ $patient->work_phone }}</div></dd>

        <dt>Mobile Phone:</dt>
        <dd><div>{{ $patient->mobile_phone }}</div></dd>

        <dt>Emergency Contact Name:</dt>
        <dd><div>{{ $patient->emergency_name }}</div></dd>

        <dt>Emergency Contact Phone Number:</dt>
        <dd><div>{{ $patient->emergency_phone }}</div></dd>

        <dt>Emergency Contact Relationship:</dt>
        <dd><div>{{ $patient->emergency_relationship }}</div></dd>

        <dt>Allergies:</dt>
        <dd><div>{{ $patient->allergies }}</div></dd>

        <dt>Permanent Resident:</dt>
        <dd><div>{{ $patient->permanent_resident }}</div></dd>

        <dt>Preferred Language:</dt>
        <dd><div>{{ $patient->preferred_language }}</div></dd>

        <dt>Other Language:</dt>
        <dd><div>{{ $patient->other_language }}</div></dd>

        <dt>Ethnic Background:</dt>
        <dd><div>{{ $patient->ethnic_background }}</div></dd>

        <dt>Family Doctor:</dt>
        <dd><div>{{ $patient->family_doctor }}</div></dd>
    </dl>

    <nav>
        {{ link_to_route('patient.index', 'Index', [], ['class' => 'btn btn-info']) }}
        |
        {{ link_to_route('patient.edit', 'Edit', [$patient->id], ['class' => 'btn btn-info']) }}
        |
        {{ Form::open(['route' => ['patient.destroy', $patient->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {{ Form::close() }}
    </nav>

@stop
