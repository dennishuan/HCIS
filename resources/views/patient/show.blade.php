@extends('layouts.master')

@section('content')

<!-- Modal Dialog -->
<div class="modal fade" id="confirm_Delete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
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
        </div>
     </div>
   </div>
</div>


<div id="Patient" class="tab-pane fade in active container">
  <h1>Showing Patient: {!!$patient->preferred_name!!}</h1>
  <div class="row">

    <div class="col col-md-12 col-lg-12">
      <div class="text-center">
        @if($patient->image == null)
        {!! HTML::image('files/profile/standard.png') !!}
        @else
        {!! HTML::image($patient->image) !!}
        @endif
      </div>
    </div>
    {!! Form::open(['route' => 'patient.store', 'method' => 'POST']) !!}


    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6 buffer">
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Personal Health Number:</span>
          {!! Form::text('phn', $patient->phn, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Preferred Name:</span>
          {!! Form::text('preferred_name', $patient->preferred_name, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Postal Code:</span>
          {!! Form::text('postal_code', $patient->postal_code, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Date of Birth:</span>
          {!! Form::text('date_of_birth', $patient->date_of_birth, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Work Phone Number:</span>
          {!! Form::text('work_phone', $patient->work_phone, ['class' => 'form-control']) !!}
        </div>
          
        <div class="input-group buffer">
            <span class="input-group-addon">Email:</span>
            {!! Form::text('email', $patient->email, ['class' => 'form-control']) !!}
        </div>
        {!! $errors->first('email') !!} 
          
         <div class="input-group buffer">
          <span class="input-group-addon">Emergency Contact Phone:</span>
          {!! Form::text('emergency_phone', $patient->emergency_phone, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Allergies:</span>
          {!! Form::text('allergies', $patient->allergies, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Preferred Language:</span>
          {!! Form::text('preferred_language', $patient->preferred_language, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Ethnic Background:</span>
          {!! Form::text('ethnic_background', $patient->ethnic_background, ['class' => 'form-control']) !!}
        </div> 
        
      </fieldset>
    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6 buffer">
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Full Name:</span>
          {!! Form::text('name', $patient->name, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Sex:</span>
          {!! Form::text('sex', $patient->sex, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Address:</span>
          {!! Form::text('address', $patient->address, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Phone Number:</span>
          {!! Form::text('home_phone', $patient->home_phone, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Mobile Phone Number:</span>
          {!! Form::text('mobile_phone', $patient->mobile_phone, ['class' => 'form-control']) !!}
        </div>
          <div class="input-group buffer">
          <span class="input-group-addon">Emergency Contact Name:</span>
          {!! Form::text('emergency_name', $patient->emergency_name, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Emergency Contact Relationship:</span>
          {!! Form::text('emergency_relationship', $patient->emergency_relationship, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Permanent Resident:</span>
          {!! Form::text('permanent_resident', $patient->permanent_resident, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Other Language:</span>
          {!! Form::text('other_language', $patient->other_language, ['class' => 'form-control']) !!}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Family Doctor:</span>
          {!! Form::text('family_doctor', $patient->family_doctor, ['class' => 'form-control']) !!}
        </div>
        
      </fieldset>
    </div>
    {!! Form::close()!!}

    <div class="col col-md-12 col-lg-12">
      <div class="input-group buffer">
        <nav>
          {!! link_to_route('patient.index', 'Back', [], ['class' => 'btn btn-info']) !!}
          |
          {!! link_to_route('patient.edit', 'Edit', [$patient->id], ['class' => 'btn btn-info']) !!}
          @if (Auth::user() != null && Auth::user()->isAdmin())
          |
          {!! Form::open(['route' => ['patient.destroy', $patient->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) !!}
        
	 <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirm_Delete" data-title="Delete Patient" data-message="Are you sure you want to delete this Patient?">Delete</button>

	 @endif
          {!! Form::close() !!}
        </nav>
      </div>
    </div>

    <!--Upload-->
    <div class="col col-md-12 col-lg-12 buffer">
      <h4>Profile Picture Upload:</h4>
      {!! Form::open(['route' => ['patient.upload', $patient->id], 'enctype' => 'multipart/form-data']) !!}
      <input id="profile" type="file" name="file">
      {!! $errors->first('image') !!}
      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
