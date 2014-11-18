@extends('layouts.master')

@section('content')

    <h1>Patient:</h1>

    <dl>
        <dt>Subjective:</dt>
        <dd><div>{{ $record->subjective }}</div></dd>

        <dt>Objective:</dt>
        <dd><div>{{ $record->objective }}</div></dd>

        <dt>Assessment:</dt>
        <dd><div>{{ $record->assessment }}</div></dd>

        <dt>Prescription:</dt>
        <dd><div>{{ $record->prescription }}</div></dd>

        <dt>Remarks:</dt>
        <dd><div>{{ $record->remarks }}</div></dd>

        <dt>Plan:</dt>
        <dd><div>{{ $record->plan }}</div></dd>

        <dt>Full Name:</dt>
        <dd><div>{{ $record->name }}</div></dd>

        <dt>Preferred Name:</dt>
        <dd><div>{{ $record->preferred_name }}</div></dd>

        <dt>Sex:</dt>
        <dd><div>{{ $record->sex }}</div></dd>

        <dt>Date of Birth:</dt>
        <dd><div>{{ $record->date_of_birth }}</div></dd>

        <dt>Address:</dt>
        <dd><div>{{ $record->address }}</div></dd>

        <dt>Postal Code:</dt>
        <dd><div>{{ $record->postal_code }}</div></dd>

        <dt>Home Phone:</dt>
        <dd><div>{{ $record->home_phone }}</div></dd>

        <dt>Work Phone:</dt>
        <dd><div>{{ $record->work_phone }}</div></dd>

        <dt>Mobile Phone:</dt>
        <dd><div>{{ $record->mobile_phone }}</div></dd>

        <dt>Emergency Contact Name:</dt>
        <dd><div>{{ $record->emergency_name }}</div></dd>

        <dt>Emergency Contact Phone Number:</dt>
        <dd><div>{{ $record->emergency_phone }}</div></dd>

        <dt>Emergency Contact Relationship:</dt>
        <dd><div>{{ $record->emergency_relationship }}</div></dd>

        <dt>Allergies:</dt>
        <dd><div>{{ $record->allergies }}</div></dd>

        <dt>Permanent Resident:</dt>
        <dd><div>{{ $record->permanent_resident }}</div></dd>

        <dt>Preferred Language:</dt>
        <dd><div>{{ $record->preferred_language }}</div></dd>

        <dt>Other Language:</dt>
        <dd><div>{{ $record->other_language }}</div></dd>

        <dt>Ethnic Background:</dt>
        <dd><div>{{ $record->ethnic_background }}</div></dd>

        <dt>Family Doctor:</dt>
        <dd><div>{{ $record->family_doctor }}</div></dd>
    </dl>

    <nav>
        {{ link_to_route('record.index', 'Index', [], ['class' => 'btn btn-info']) }}
        |
        {{ link_to_route('record.edit', 'Edit', [$record->id], ['class' => 'btn btn-info']) }}
        |
        {{ Form::open(['route' => ['record.destroy', $record->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {{ Form::close() }}
    </nav>

@stop
