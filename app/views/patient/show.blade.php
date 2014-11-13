@extends('layouts.default')

@section('content')
    <h1>Patient:</h1>

<dl>
    <dt>Personal Health Number:</dt>
    <dd><div>{{ $patient->phn }}</div></dd>

    <dt>Full Name:</dt>
    <dd><div>{{ $patient->name }}</div></dd>

    <dt>Sex:</dt>
    <dd><div>{{ $patient->sex }}</div></dd>

    <dt>Date of Birth:</dt>
    <dd><div>{{ $patient->date_of_birth }}</div></dd>

    <dt>Address:</dt>
    <dd><div>{{ $patient->address }}</div></dd>

    <dt>Postal Code:</dt>
    <dd><div>{{ $patient->postal_code }}</div></dd>

    <dt>Phone:</dt>
    <dd><div>{{ $patient->phone }}</div></dd>

    <dt>Family Doctor:</dt>
    <dd><div>{{ $patient->family_doctor }}</div></dd>
</dl>

<p>
    {{ link_to("/patient", 'Return to Index') }}
    |
    {{ link_to("/patient/{$patient->id}/edit", 'Edit this patient') }}
</p>

@stop
