@extends('layouts.master')


@section('content')
<div id="User" class="tab-pane fade in active container">
  <h1>{{$user->name}}</h1>
  <div class="row">
    {{ Form::open(['route' => 'user.store', 'method' => 'POST']) }}

    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6">
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Username:</span>
          {{ Form::text('username', $user->username, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Name:</span>
          {{ Form::text('name', $user->name, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Phone Number:</span>
          {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
        </div>
      </fieldset>

      <div class="input-group buffer">
        <nav>
          {{ link_to_route('user.index', 'Index', [], ['class' => 'btn btn-info']) }}
          |
          {{ link_to_route('user.edit', 'Edit', [$user->id], ['class' => 'btn btn-info']) }}

          @if (Auth::user() != null && Auth::user()->isAdmin())
          |
          {{ Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
          {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
          @endif

          {{ Form::close() }}
        </nav>
      </div>
    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6">
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Type:</span>
          {{ Form::text('type', $user->type, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Email:</span>
          {{ Form::text('email', $user->email, ['class' => 'form-control']) }}
        </div>
      </fieldset>
    </div>
    {{ Form::close()}}
  </div>
</div>
@stop


