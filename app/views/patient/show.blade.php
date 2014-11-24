@extends('layouts.master')

@section('content')
<div id="Patient" class="tab-pane fade in active container">
  <h1>{{$patient->preferred_name}}</h1>
  <div class="row">
    {{ Form::open(['route' => 'patient.store', 'method' => 'POST']) }}

    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6">
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Personal Health Number:</span>
          {{ Form::text('phn', $patient->phn, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Preferred Name:</span>
          {{ Form::text('preferred_name', $patient->preferred_name, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Postal Code:</span>
          {{ Form::text('postal_code', $patient->postal_code, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Date of Birth:</span>
          {{ Form::text('date_of_birth', $patient->date_of_birth, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Work Phone Number:</span>
          {{ Form::text('work_phone', $patient->work_phone, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Emergency Contact Name:</span>
          {{ Form::text('emergency_name', $patient->emergency_name, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Emergency Contact Relationship:</span>
          {{ Form::text('emergency_relationship', $patient->emergency_relationship, ['class' => 'form-control']) }}
        </div>

        @if($patient->permanent_resident == '1')
            <div class="input-group buffer">
              <span class="input-group-addon">Permanent Resident:</span>
              {{ Form::text('permanent_resident', 'Yes', ['class' => 'form-control']) }}
            </div>
        @else
            <div class="input-group buffer">
              <span class="input-group-addon">Permanent Resident:</span>
              {{ Form::text('permanent_resident', 'No', ['class' => 'form-control']) }}
            </div>
        @endif

        <div class="input-group buffer">
          <span class="input-group-addon">Other Language:</span>
          {{ Form::text('other_language', $patient->other_language, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Family Doctor:</span>
          {{ Form::text('family_doctor', $patient->family_doctor, ['class' => 'form-control']) }}
        </div>



      </fieldset>

      <div class="input-group buffer">
        <nav>
          {{ link_to_route('patient.index', 'Index', [], ['class' => 'btn btn-info']) }}
          |
          {{ link_to_route('patient.edit', 'Edit', [$patient->id], ['class' => 'btn btn-info']) }}
          @if (Auth::user() != null && Auth::user()->isAdmin())
          |
          {{ Form::open(['route' => ['patient.destroy', $patient->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
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
          <span class="input-group-addon">Full Name:</span>
          {{ Form::text('name', $patient->name, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Sex:</span>
          {{ Form::text('sex', $patient->sex, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Address:</span>
          {{ Form::text('address', $patient->address, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Phone Number:</span>
          {{ Form::text('home_phone', $patient->home_phone, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Mobile Phone Number:</span>
          {{ Form::text('mobile_phone', $patient->mobile_phone, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Emergency Contact Phone:</span>
          {{ Form::text('emergency_phone', $patient->emergency_phone, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Allergies:</span>
          {{ Form::text('allergies', $patient->allergies, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Preferred Language:</span>
          {{ Form::text('preferred_language', $patient->preferred_language, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Ethnic Background:</span>
          {{ Form::text('ethnic_background', $patient->ethnic_background, ['class' => 'form-control']) }}
        </div>
      </fieldset>
    </div>
    {{ Form::close()}}
  </div>
</div>
@stop
