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
                <th>Abbrev.</th>
                <th>Name</th>
                <th>Type</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Postal Code</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($facilities as $facility)
            <tr>
                <td>{{ $facility->abbrev }}</td>
                <td>{{ $facility->name }}</td>
                <td>{{ $facility->type }}</td>
                <td>{{ $facility->phone }}</td>
                <td>{{ $facility->address }}</td>
                <td>{{ $facility->postal_code }}</td>
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
