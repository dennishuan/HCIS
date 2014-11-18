@extends('layouts.master')

@section('navbar')

{{Form::open(['route'=>'user.search', 'class' => "navbar-form navbar-left form-inline"])}}
<div class="form-group">
{{Form::text('keyword', null, ['placeholder' => 'Search for Username',  'class' => 'form-control', 'size' => '25'])}}
  </div>
{{Form::submit('Search', ['class' => 'btn btn-default'])}}
{{ link_to_route('user.create', 'new User', [], ['class' => 'btn btn-info']) }}

{{Form::close()}}

@stop


@section('content')

<!--Search bar-->

<!--Table-->
<table class="table table-hover table-condensed">
  <thead>
    <tr>
      <th>Username</th>
      <th>Type</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($users as $user)

    <td>{{ $user->username }}</td>
    <td>{{ $user->type }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phone }}</td>
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


