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

    <!-- Record Tab -->
    <div id="record" class="tab-pane fade in active container">
      <h3>Search for Record</h3>
      <div class="row">
        {{ Form::Open(['route' => 'search.store', 'method' => 'POST'])}}
        <input name="model" type="hidden" value="record">
        <!-- Left side of form -->
        <div class="col col-md-6 col-lg-6">

          <div class="input-group">
            <span class="input-group-addon">Doctor:</span>
            {{ Form::text('user', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Legal Name:</span>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Sex:</span>
            <select class="form-control" name="sex">
              <option value=""></option>
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Address:</span>
            {{ Form::text('address', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Home Phone:</span>
            {{ Form::text('home_phone', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Mobile Phone:</span>
            {{ Form::text('mobile_phone', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Emergency Contact Phone:</span>
            {{ Form::text('emergency_phone', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Emergency Contract Relationship:</span>
            {{ Form::text('emergency_relationship', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Preferred Language:</span>
            {{ Form::text('preferred_language', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Ethnic Background:</span>
            {{ Form::text('ethnic_background', null, ['class' => 'form-control']) }}
          </div>


          <div class="input-group buffer">
            <span class="input-group-addon">Priority:</span>
            <select class="form-control" name="priority">
              <option value=""></option>
              <option value="6">6</option> <!-- Clinic -->
              <option value="5">5</option>
              <option value="4">4</option>
              <option value="3">3</option>
              <option value="2">2</option>
              <option value="1">1</option>
            </select>
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Admittance Date:</span>
            {{ Form::text('admit_datetime', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Arrival Mode:</span>
            {{ Form::text('arrival_mode', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            {{ Form::submit('Search for Record', ['class' => 'btn btn-info'])}}
          </div>
        </div>

        <!-- Right side of form -->
        <div class="col col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">Facility Name or Abbrev.:</span>
            {{ Form::text('facility' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Personal Health Number:</span>
            {{ Form::text('phn', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Preferred Name:</span>
            {{ Form::text('preferred_name', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Date of Birth:</span>
            {{ Form::text('date_of_birth', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Work Phone:</span>
            {{ Form::text('work_phone', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Postal Code:</span>
            {{ Form::text('postal_code', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Emergency Contact Name:</span>
            {{ Form::text('emergency_name', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Allergies:</span>
            {{ Form::text('allergies', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Secondary Language:</span>
            {{ Form::text('other_language', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Permanent Resident:</span>
            <select class="form-control" name="permanent_resident">
              <option value=""></option>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Doctor:</span>
            {{ Form::text('family_doctor', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Registration Date:</span>
            {{ Form::text('reg_datetime', null, ['class' => 'form-control']) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Chief Complaint Code:</span>
            {{ Form::text('chief_compl_code', null, ['class' => 'form-control']) }}
          </div>
        </div>
        {{ Form::close()}}
      </div>
    </div>
    <!-- End record tab -->

    <!-- Patient tab -->
    <div id="patient" class="tab-pane fade container">
      <h3>Search for Patient</h3>
      <div class="row">
        {{ Form::open(['route' => 'search.store', 'method' => 'POST']) }}
        <input name="model" type="hidden" value="patient">
        <!--Left side of form-->
        <div class="col col-md-6 col-lg-6">

          <div class="input-group">
            <span class="input-group-addon">Personal Health Number:</span>
            {{ Form::text('phn', null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Name:</span>
            {{ Form::text('name' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Date of Birth:</span>
            {{ Form::text('date_of_birth' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Postal Code:</span>
            {{ Form::text('postal_code' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Work Phone:</span>
            {{ Form::text('work_phone' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Email:</span>
            {{ Form::text('email' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Emergency Phone:</span>
            {{ Form::text('emergency_phone' , null, ['class' => 'form-control'] ) }}
          </div>



          <div class="input-group buffer">
            <span class="input-group-addon">Medical History:</span>
            {{ Form::text('medical_history' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Secondary Language:</span>
            {{ Form::text('other_language' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Family Doctor:</span>
            {{ Form::text('family_doctor' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            {{ Form::submit('Search for Patient', ['class' => 'btn btn-info'])}}
          </div>
        </div>
        <!-- End left side of form -->

        <!-- Right side of form -->
        <div class="col col-md-6 col-lg-6">

          <div class="input-group">
            <span class="input-group-addon">Preferred Name:</span>
            {{ Form::text('preffered_name' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Sex:</span>
            <select class="form-control" name="sex">
              <option value=""></option>
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Address:</span>
            {{ Form::text('address' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Home Phone:</span>
            {{ Form::text('home_phone' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Mobile Phone:</span>
            {{ Form::text('mobile_phone' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Emergency Name:</span>
            {{ Form::text('emergency_name' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Emergency Relationship:</span>
            {{ Form::text('emergency_relationship' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Permanent Resident:</span>
            <select class="form-control" name="permanent_resident">
              <option value=""></option>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Preferred Language:</span>
            {{ Form::text('preferred_lnguage' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Ethnic Background:</span>
            {{ Form::text('ethnic_background' , null, ['class' => 'form-control'] ) }}
          </div>

        </div>
        <!-- End right side of form -->
        {{ Form::close()}}
      </div>
    </div>
    <!-- End patient tab -->

    <!-- User tab -->
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
            <select class="form-control" name="type">
              <option value=""></option>
              @if (Auth::user() != null && Auth::user()->isAdmin())
              <option value="admin">Admin</option>
              @endif
              <option value="doctor">Doctor</option>
              <option value="nurse">Nurse</option>
            </select>
          </div>
        </div>
        {{ Form::close()}}
      </div>
    </div>
    <!-- End search user tab -->

    <!-- Begin facility tab -->
    <div id="facility" class="tab-pane fade container">
      <h3>Search for Facility</h3>
      <div class="row">
        {{ Form::open(['route' => 'search.store', 'method' => 'POST']) }}
        <input name="model" type="hidden" value="facility">
        <!--Left side of form-->
        <div class="col col-md-6 col-lg-6">
          <div class="input-group">
            <span class="input-group-addon">Abbreviation:</span>
            {{ Form::text('abbrev', null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Name:</span>
            {{ Form::text('name' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Phone:</span>
            {{ Form::text('phone' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Type:</span>
            <select class="form-control" name="type">
              <option value=""></option>
              <option value="hospital">Hopstial</option>
              <option value="clinic">Clinic</option>
            </select>
          </div>

          <div class="input-group buffer">
            {{ Form::submit('Search for Facility', ['class' => 'btn btn-info'])}}
          </div>
        </div>
        <!-- End left side of form -->

        <!-- Right side of form -->
        <div class="col col-md-6 col-lg-6">

          <div class="input-group">
            <span class="input-group-addon">Fax:</span>
            {{ Form::text('fax' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Address:</span>
            {{ Form::text('address' , null, ['class' => 'form-control'] ) }}
          </div>

          <div class="input-group buffer">
            <span class="input-group-addon">Postal Code:</span>
            {{ Form::text('postal_code' , null, ['class' => 'form-control'] ) }}
          </div>
        </div>
        <!-- End right side of form -->
        {{ Form::close()}}
      </div>
    </div>
    <!-- End facility search -->

  </div> <!-- End div/tab content -->
</div>
@stop
