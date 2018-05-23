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
       <button type="button" class="btn btn-danger" id="confirm">Delete</button>       </div>
    </div>
  </div>
</div>

<div id="Facility" class="tab-pane fade in active container">
  <h1>Showing Facility: {{$facility->name}}</h1>
  <div class="row">
    {{ Form::open(['route' => 'facility.store', 'method' => 'POST']) }}

    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6">
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Facility Name:</span>
          {{ Form::text('name', $facility->name, ['class' => 'form-control']) }}
        </div>
        
        <div class="input-group buffer">
          <span class="input-group-addon">Type:</span>
          {{ Form::text('type', $facility->type, ['class' => 'form-control']) }}
        </div>
          
        <div class="input-group buffer">
          <span class="input-group-addon">Address:</span>
          {{ Form::text('address', $facility->address, ['class' => 'form-control']) }}
        </div>
      </fieldset>
    </div>

    <!-- Right side of form -->
    <div class="col col-md-6 col-lg-6">
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Facility Abbrev.:</span>
          {{ Form::text('abbrev', $facility->abbrev, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Phone Number:</span>
          {{ Form::text('phone', $facility->phone, ['class' => 'form-control']) }}

          <span class="input-group-addon">Fax Number:</span>
          {{ Form::text('fax', $facility->fax, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Postal Code:</span>
          {{ Form::text('postal_code', $facility->postal_code, ['class' => 'form-control']) }}
        </div>
      </fieldset>
    </div>
    {{ Form::close() }}

    <div class="col col-md-12 col-lg-12">
      <div class="input-group buffer">
        <nav>
          {{ link_to_route('facility.index', 'Back', [], ['class' => 'btn btn-info']) }}

          @if (Auth::user() != null && Auth::user()->isAdmin())
          |
          {{ link_to_route('facility.edit', 'Edit', [$facility->id], ['class' => 'btn btn-info']) }}
          |
          {{ Form::open(['route' => ['facility.destroy', $facility->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
         
         <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirm_Delete" data-title="Delete Facility" data-message="Are you sure you want to delete this Facility?">Delete</button>

          {{ Form::close() }}
          @endif

        </nav>
      </div>
    </div>

  </div>
</div>
@stop
