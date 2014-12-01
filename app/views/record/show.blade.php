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
    </div>
   </div>
  </div>
</div>

<div id="PatientRecord" class="tab-pane fade in active container">
  <h1>Showing Record: {{$record->patient->name}}</h1>
  <div class="row">
    {{ Form::open(['route' => 'record.store', 'method' => 'POST']) }}

    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6">
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Legal Name:</span>
          {{ Form::text('name', $record->patient->name, ['class' => 'form-control']) }}
        </div>

       <div class="input-group buffer">
          <span class="input-group-addon">Sex:</span>
          {{ Form::text('sex', $record->patient->sex, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Address:</span>
          {{ Form::text('address', $record->patient->address, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Home Phone:</span>
          {{ Form::text('home_phone', $record->patient->home_phone, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Mobile Phone:</span>
          {{ Form::text('mobile_phone', $record->patient->mobile_phone, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Emergency Contact Phone:</span>
          {{ Form::text('emergency_phone', $record->patient->emergency_phone, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Allergies:</span>
          {{ Form::text('allergies', $record->patient->allergies, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Preferred Language:</span>
          {{ Form::text('preferred_language', $record->patient->preferred_language, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Ethnic Background:</span>
          {{ Form::text('ethnic_background', $record->patient->ethnic_background, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Facility Abbrev.:</span>
          {{ Form::text('ethnic_background', $record->facility->abbrev, ['class' => 'form-control']) }}
        </div>


        <div class="input-group buffer">
          <span class="input-group-addon">Priority:</span>
          {{ Form::text('priority', $record->priority, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Registration Date:</span>
          {{ Form::text('reg_datetime', $record->reg_datetime, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Arrival Mode:</span>
          {{ Form::text('arrival_mode', $record->arrival_mode, ['class' => 'form-control']) }}
        </div>
      </fieldset>
    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6">
      <fieldset disabled>

        <div class="input-group">
          <span class="input-group-addon">Personal Health Number:</span>
          {{ Form::text('phn', $record->patient->phn, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Preferred Name:</span>
          {{ Form::text('preferred_name', $record->patient->preferred_name, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Date of Birth:</span>
          {{ Form::text('date_of_birth', $record->patient->date_of_birth, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Postal Code:</span>
          {{ Form::text('postal_code', $record->patient->postal_code, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Work Phone:</span>
          {{ Form::text('work_phone', $record->patient->work_phone, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Emergency Contact Name:</span>
          {{ Form::text('emergency_name', $record->patient->emergency_name, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Emergency Contract Relationship:</span>
          {{ Form::text('emergency_relationship', $record->patient->emergency_relationship, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Permanent Resident:</span>
          {{ Form::text('permanent_resident', $record->patient->permanent_resident, ['class' => 'form-control']) }}
        </div>
          
        <div class="input-group buffer">
          <span class="input-group-addon">Preferred Language:</span>
          {{ Form::text('preferred_language', $record->patient->preferred_language, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Doctor:</span>
          {{ Form::text('family_doctor', $record->patient->family_doctor, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Facility:</span>
          {{ Form::text('family_doctor', $record->facility->name, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Admittance Date:</span>
          {{ Form::text('admit_datetime', $record->admit_datetime, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Chief Complaint Code:</span>
          {{ Form::text('chief_compl_code', $record->chief_compl_code, ['class' => 'form-control']) }}
        </div>
      </fieldset>
    </div>


    <!-- Text Fields -->
    <div class="col col-md-12 col-lg-12">
      <fieldset disabled>
         <div class="input-group buffer">
          <span class="input-group-addon">Chief Complaint:</span>
          {{ Form::textarea('chief_compl', $record->chief_compl, ['class' => 'form-control', 'rows' => '3']) }}
        </div>
          
        <div class="input-group buffer">
          <span class="input-group-addon">Stated Complaint:</span>
          {{ Form::textarea('stated_compl', $record->stated_compl, ['class' => 'form-control', 'rows' => '3']) }}
        </div>


        <div class="input-group buffer">
          <span class="input-group-addon">Subjective:</span>
          {{ Form::textarea('subjective', $record->subjective, ['class' => 'form-control', 'rows' => '3']) }}
        </div>


        <div class="input-group buffer">
          <span class="input-group-addon">Objective:</span>
          {{ Form::textarea('objective', $record->objective, ['class' => 'form-control', 'rows' => '3']) }}
        </div>


        <div class="input-group buffer">
          <span class="input-group-addon">Assessment:</span>
          {{ Form::textarea('assessment', $record->assessment, ['class' => 'form-control', 'rows' => '3']) }}
        </div>


        <div class="input-group buffer">
          <span class="input-group-addon">Prescription:</span>
          {{ Form::textarea('prescription', $record->prescription, ['class' => 'form-control', 'rows' => '3']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Remarks:</span>
          {{ Form::textarea('remarks', $record->remarks, ['class' => 'form-control', 'rows' => '3']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Plan:</span>
          {{ Form::textarea('plan', $record->plan, ['class' => 'form-control', 'rows' => '3']) }}
        </div>
      </fieldset>
    </div>
    {{ Form::close() }}


    <!-- Buttons -->
    <div class="col col-md-6 col-lg-6">
      <div class="input-group buffer">
        <nav>
          {{ link_to_route('record.index', 'Back', [], ['class' => 'btn btn-info']) }}
          |
          {{ link_to_route('record.edit', 'Edit', [$record->id], ['class' => 'btn btn-info']) }}
          @if (Auth::user() != null && Auth::user()->isAdmin())
          |
          {{ Form::open(['route' => ['record.destroy', $record->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}

         <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirm_Delete" data-title="Delete Record" data-message="Are you sure you want to delete this Record?">Delete</button>

          @endif
          {{ Form::close() }}
        </nav>
      </div>
    </div>

    <!--Upload-->
    <div class="col col-md-12 col-lg-12 buffer">
      <h4>File upload:</h4>
      <p>hold down ctrl to select multiple files</p>
      {{ Form::open(['route' => ['record.upload', $record->id], 'enctype' => 'multipart/form-data']) }}
      <input id="recordFile" type="file" name="file[]" multiple="true">
      {{ $errors->first('path') }}
      {{ $errors->first('file') }}
      {{ Form::close() }}
    </div>

    <!--Download-->
    <div class="col col-md-12 col-lg-12 buffer">
      <h4>Files:</h4>
      @if ($record->files()->get()->isEmpty())
      <p>Empty. No file is associated with this record</p>
      @endif
      @foreach ($record->files()->get() as $file)
      <p><a href="{{ asset($file->path) }}"> {{ displayFilename($file->path) }}</a></p>
      @endforeach
    </div>

    <!--Hidden Link-->


  </div>
</div>
@stop
