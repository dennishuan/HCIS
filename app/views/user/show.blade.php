@extends('layouts.master')


@section('content')
<div id="User" class="tab-pane fade in active container">
  <h1>{{$user->name}}</h1>
  <div class="row">

    <div class="col col-md-12 col-lg-12">
      <div class="text-center">
        @if($user->image == null)
        {{ HTML::image('files/profile/standard.png') }}
        @else
        {{ HTML::image($user->image) }}
        @endif
      </div>
    </div>

    {{ Form::open(['route' => 'user.store', 'method' => 'POST']) }}

    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6 buffer">

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
    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6 buffer">
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

    <div class="col col-md-12 col-lg-12">
      <div class="input-group buffer">
        <nav>
          {{ link_to_route('user.index', 'Index', [], ['class' => 'btn btn-info']) }}
          |
          {{ link_to_route('user.edit', 'Edit', [$user->id], ['class' => 'btn btn-info']) }}
          |
          {{ link_to_route('user.password', 'Change Password', [$user->id], ['class' => 'btn btn-info']) }}

          @if (Auth::user() != null && Auth::user()->isAdmin())
          |
          {{ Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
          {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
          {{ Form::close() }}
          @endif
        </nav>
      </div>
    </div>

    <!--Upload-->
    <div class="col col-md-12 col-lg-12 buffer">
      <h4>Profile Picture Upload:</h4>
      {{ Form::open(['route' => ['user.upload', $user->id], 'enctype' => 'multipart/form-data']) }}
      <input id="profile" type="file" name="file">
      {{ $errors->first('image') }}
      {{ Form::close() }}
    </div>

  </div>
</div>
@stop


