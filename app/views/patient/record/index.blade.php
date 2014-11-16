@extends('layouts.default')

@section('content')

    <!--Search bar-->
    {{Form::open(['route'=>['patient.record.search', $patient_id]])}}
        {{Form::text('keyword', $keyword, ['placeholder' => 'Notes', 'size' => '25']) }}
        {{Form::submit('Search', ['class' => 'btn'])}}
        {{ link_to_route('patient.record.create', 'Create', [$patient_id], ['class' => 'btn btn-info']) }}
    {{Form::close()}}

    <!--Table-->
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>patient_id</th>
                <th>facility_id</th>
                <th>user_id</th>
                <th>subjective</th>
                <th>objective</th>
                <th>assessment</th>
                <th>prescription</th>
                <th>remarks</th>
                <th>plan</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($records as $record)
            <tr>
                <td>{{ $record->patient_id }}</td>
                <td>{{ $record->facility_id }}</td>
                <td>{{ $record->user_id }}</td>
                <td>{{ $record->notes }}</td>

                <td>{{ link_to_route('patient.record.show', 'Details', [$patient_id, $record->id], ['class' => 'btn btn-info']) }}</td>
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
