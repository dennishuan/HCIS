@extends('layouts.default')

@section('content')

    <!--Search bar-->
    {{Form::open(['route'=>'user.search'])}}
        {{Form::text('keyword', $keyword, ['placeholder' => 'Personal Health Number', 'size' => '25']) }}
        {{Form::submit('Search', ['class' => 'btn'])}}
        {{ link_to_route('user.create', 'Create', [], ['class' => 'btn btn-info']) }}
    {{Form::close()}}

    <!--Table-->
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Personal Health Number</th>
                <th>Full Name</th>
                <th>Preferred Name</th>
                <th>Sex</th>
                <th>Date of Birth</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->phn }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->preferred_name }}</td>
                <td>{{ $user->sex }}</td>
                <td>{{ $user->date_of_birth }}</td>
                <td>{{ link_to_route('user.show', 'Details', [$user->id], ['class' => 'btn btn-info']) }}</td>
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
        {{ $users->appends(Request::except('page'))->links() }}
    </div>

@stop
