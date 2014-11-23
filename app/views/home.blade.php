@extends('layouts/default')

@section('content')

<h2>{{ link_to('image', 'AddImage') }}<h2>

<div> {{ link_to('files', 'Addfile') }}</div>

<div> {{ link_to('patient', 'viewPatients') }}</div>



<table class="table table-hover">
    <thead>
        <tr>
            <th>Personal Health  Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Sex</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Postal Code</th>
            <th>Phone</th>
            <th>Family Doctor</th>

        </tr>
    </thead>

    <tbody>

        @foreach($patients as $patient)
        <tr>
            <td>{{ $patient->phn }}</td>
            <td>{{ $patient->first_name }}</td>
            <td>{{ $patient->last_name }}</td>
            <td>{{ $patient->sex }}</td>
            <td>{{ $patient->date_of_birth }}</td>
            <td>{{ $patient->address }}</td>
            <td>{{ $patient->postal_code }}</td>
            <td>{{ $patient->phone }}</td>
            <td>{{ $patient->family_doctor }}</td>
        </tr>
        @endforeach

    </tbody>

</table>

{{ $patients->appends(Request::except('page'))->links() }}


{{ Form::open(['route' => 'login.destroy']) }}
{{ Form::submit('Logout') }}
{{ Form::close() }}

@stop
