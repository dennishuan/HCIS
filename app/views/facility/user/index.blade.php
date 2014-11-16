@extends('layouts.default')

@section('content')

    <!--Search bar-->
    {{Form::open(['route'=>['facility.user.search', $id]])}}
        {{Form::text('keyword', $keyword, ['placeholder' => 'Notes', 'size' => '25']) }}
        {{Form::submit('Search', ['class' => 'btn'])}}
        {{ link_to_route('facility.user.create', 'Create', [$id], ['class' => 'btn btn-info']) }}
    {{Form::close()}}

    <!--Table-->
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>id</th>
                <th>id</th>
                <th>user_id</th>
                <th>notes</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->notes }}</td>

                <td>{{ link_to_route('facility.user.show', 'Details', [$id, $user->id], ['class' => 'btn btn-info']) }}</td>
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
