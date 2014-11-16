@extends('layouts.default')

@section('content')

    <!--Search bar-->
    {{Form::open(['route'=>'record.search'])}}
        {{Form::text('keyword', $keyword, ['placeholder' => 'Personal Health Number', 'size' => '25']) }}
        {{Form::submit('Search', ['class' => 'btn'])}}
        {{ link_to_route('record.create', 'Create', [], ['class' => 'btn btn-info']) }}
    {{Form::close()}}

    <!--Table-->
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>notes</th>
                <th>Full Name</th>
                <th>Preferred Name</th>
                <th>Sex</th>
                <th>Date of Birth</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($records as $record)
            <tr>
                <td>{{ $record->notes }}</td>
                <td>{{ $record->name }}</td>
                <td>{{ $record->preferred_name }}</td>
                <td>{{ $record->sex }}</td>
                <td>{{ $record->date_of_birth }}</td>
                <td>{{ link_to_route('record.show', 'Details', [$record->id], ['class' => 'btn btn-info']) }}</td>
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
        {{ $records->appends(Request::except('page'))->links() }}
    </div>

@stop
