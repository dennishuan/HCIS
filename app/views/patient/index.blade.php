@extends('layouts.default')

@section('content')
    <h1>Patient Table {{ link_to_route('login.destroy', 'Logout', [], ['class' => 'btn btn-default pull-right']) }}</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Personal Health  Number</th>
                <th>Full Name</th>
                <th>Sex</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Postal Code</th>
                <th>Phone</th>
                <th>Family Doctor</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->phn }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->sex }}</td>
                <td>{{ $patient->date_of_birth }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->postal_code }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->family_doctor }}</td>

                <td>
                    {{ link_to_route('patient.edit', 'Edit', [$patient->id], ['class' => 'btn btn-info']) }}
                    {{ Form::open(['route' => ['patient.destroy', $patient->id], 'method' => 'DELETE']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {{ Form::close() }}

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <p>{{ link_to_route('patient.create', 'Create', [], ['class' => 'btn btn-info']) }}</p>
        <p>{{ $patients->appends(Request::except('page'))->links() }}</p>
    </div>
@stop
