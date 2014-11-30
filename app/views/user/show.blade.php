@extends('layouts.master')


@section('content')

<!-- Modal Dialog -->
<div class="modal fade" id="confirm_Delete" role="dialog" aria-labelledby="confi
rmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Delete Parmanently</h4>
      </div>
      <div class="modal-body">
       <p>Are you sure about this ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	<button type="button" class="btn btn-danger" id="confirm">Delete</button>
	</div>								           </div>
  </div>
</div>

<div id="User" class="tab-pane fade in active container">
  <h1>Showing User: {{$user->name}}</h1>
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
          @if (Auth::user() != null && Auth::user()->isAdmin())
          |
          {{ link_to_route('user.edit', 'Edit', [$user->id], ['class' => 'btn btn-info']) }}
          |
          {{ link_to_route('user.password', 'Change Password', [$user->id], ['class' => 'btn btn-info']) }}
          |
          {{ Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE', 
            'style' => 'display:inline; margin:0px; padding:0px;'])}}

         <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirm_Delete" data-title="Delete User" data-message="Are you sure you want to delete this User?">Delete</button>

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


