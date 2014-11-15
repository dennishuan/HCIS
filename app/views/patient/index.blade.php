@extends('layouts.default')

@section('content')
    <!-- Logout button-->
    <h1>Patient Table {{ link_to_route('login.destroy', 'Logout', [], ['class' => 'btn btn-default pull-right']) }}</h1>

    <!--Search bar-->
    {{Form::open(['route'=>'patient.search'])}}
        {{Form::text('keyword', null, ['placeholder' => 'Personal Health Number', 'size' => '25'])}}
        {{Form::submit('Search', ['class' => 'btn'])}}
        {{ link_to_route('patient.create', 'Create', [], ['class' => 'btn btn-info']) }}
    {{Form::close()}}

    <!--Table-->
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Personal Health  Number</th>
                <th>Full Name</th>
                <th>Preferred Name</th>
                <th>Sex</th>
                <th>Date of Birth</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->phn }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->preferred_name }}</td>
                <td>{{ $patient->sex }}</td>
                <td>{{ $patient->date_of_birth }}</td>
                <td>{{ link_to_route('patient.show', 'Details', [$patient->id], ['class' => 'btn btn-info']) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <!-- Pagination bar -->
        <!---------------------------------------------------------------
            appends() to maintian other part of the query string
            Else the links() will not include the rest of query string.
            Just copy the whole thing and change the variable if you do
            not understand what I am talking about.
        ----------------------------------------------------------------->
        {{ $patients->appends(Request::except('page'))->links() }}
    </div>

@stop
