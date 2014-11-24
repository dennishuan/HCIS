@extends('layouts.master')

@section('content')
<div id="Facility" class="tab-pane fade in active container">
  <h1>{{$facility->name}}</h1>
  <div class="row">
    {{ Form::open(['route' => 'facility.store', 'method' => 'POST']) }}

    <!-- Left side of form -->
    <div class="col col-md-6 col-lg-6">
      <fieldset disabled>
        <div class="input-group">
          <span class="input-group-addon">Facility Name:</span>
          {{ Form::text('name', $facility->name, ['class' => 'form-control']) }}
        </div>

        <!-- NOTE TYPE IS NOT AN ENUM -->
        <div class="input-group buffer">
          <span class="input-group-addon">Type:</span>
          {{ Form::text('type', $facility->type, ['class' => 'form-control']) }}
        </div>

        <div class="input-group buffer">
          <span class="input-group-addon">Address:</span>
          {{ Form::text('address', $facility->address, ['class' => 'form-control']) }}
        </div>
      </fieldset>

      <div class="input-group buffer">
        <nav>
          {{ link_to_route('facility.index', 'Index', [], ['class' => 'btn btn-info']) }}

          @if (Auth::user() != null && Auth::user()->isAdmin())
          |
          {{ link_to_route('facility.edit', 'Edit', [$facility->id], ['class' => 'btn btn-info']) }}
          |
          {{ Form::open(['route' => ['facility.destroy', $facility->id], 'method' => 'DELETE', 'style' => 'display:inline; margin:0px; padding:0px;']) }}
          {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
          {{ Form::close() }}
          @endif
        </nav>
      </div>
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
  </div>
</div>
@stop
