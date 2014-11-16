@extends('layouts.default')

@section('content')

    <!--Search bar-->
    {{Form::open(['route'=>'facility.search'])}}
        {{Form::text('keyword', $keyword, ['placeholder' => 'Personal Health Number', 'size' => '25']) }}
        {{Form::submit('Search', ['class' => 'btn'])}}
        {{ link_to_route('facility.create', 'Create', [], ['class' => 'btn btn-info']) }}
    {{Form::close()}}

    <!--Table-->
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>facility_name</th>
                <th>Full Name</th>
                <th>Preferred Name</th>
                <th>Sex</th>
                <th>Date of Birth</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($facilities as $facility)
            <tr>
                <td>{{ $facility->facility_name }}</td>
                <td>{{ $facility->name }}</td>
                <td>{{ $facility->preferred_name }}</td>
                <td>{{ $facility->sex }}</td>
                <td>{{ $facility->date_of_birth }}</td>
                <td>{{ link_to_route('facility.show', 'Details', [$facility->id], ['class' => 'btn btn-info']) }}</td>
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
        {{ $facilities->appends(Request::except('page'))->links() }}
    </div>

@stop
