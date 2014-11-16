@extends('layouts.master')

@section('content')

<!--Search bar-->

<div class="">
  <ul class="nav nav-pills nav-justified">
    <li class="active"><a data-toggle="tab" href="#record">Record</a></li>
    <li><a data-toggle="tab" href="#patient">Patient</a></li>
    <li><a data-toggle="tab" href="#user">User</a></li>
    <li><a data-toggle="tab" href="#facility">Facility</a></li>

  </ul>
  <div class="tab-content">
    <div id="record" class="tab-pane fade in active container">
      <h3>Search</h3>
      <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
    </div>
    <div id="patient" class="tab-pane fade container">
      <h3>Search</h3>
      <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
    </div>
    <div id="user" class="tab-pane fade container">
      <h3>Search for User</h3>
      <div class="row">
        {{ Form::open(['route' => 'search.store', 'method' => 'POST']) }}
        <input name="model" type="hidden" value="user">
        <div class="col col-md-6 col-lg-6">

          <div class="input-group">
            <span class="input-group-addon">Full Name:</span>
            {{ Form::text('name', null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Email:</span>
            {{ Form::text('email' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Phone:</span>
            {{ Form::text('phone' , null, ['class' => 'form-control'] ) }}

          </div>

          <div class="input-group buffer">
            {{ Form::submit('Search for User', ['class' => 'btn btn-info'])}}
          </div>

        </div>

        <div class="col col-md-6 col-lg-6">

          <div class="input-group">
            <span class="input-group-addon">Username:</span>
            {{ Form::text('username' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Type:</span>
            <select class="form-control">
              @if (Auth::user() != null && Auth::user()->isAdmin())
              <option>admin</option>
              @endif
              <option>doctor</option>
              <option>nurse</option>
            </select>
          </div>



        </div>
        {{ Form::close()}}
      </div>
    </div>
    <div id="facility" class="tab-pane fade container">
      <h3>Search</h3>
      <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
    </div>
  </div>
</div>







@stop
