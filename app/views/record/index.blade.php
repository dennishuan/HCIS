

@extends('layouts.master')

@section('content')

<!--Button-->
<div id="toolbar" class="btn-group btn-default">
  <button class="btn btn-default" id="create">
    <i class="glyphicon glyphicon-file"></i> <span>New</span>
  </button>
  <button class="btn btn-default" id="show">
    <i class="glyphicon glyphicon-new-window"></i> <span>Show</span>
  </button>
  <button class="btn btn-default" id="edit">
    <i class="glyphicon glyphicon-edit"></i> <span>Edit</span>
  </button>
  <button class="btn btn-default" id="delete">
    <i class="glyphicon glyphicon-trash"></i> <span>Delete</span>
  </button>

</div>


<!--Table-->
<div id="list">
  <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-refresh="true" data-show-columns="true" data-toolbar="#toolbar">
    <thead>
      <tr>
        <th data-field="state" data-checkbox="true"></th>
        <th data-field="patient.phn" data-sortable="true">Personal Health #</th>
        <th data-field="patient.name" data-sortable="true">Full Name</th>
        <th data-field="patient.preferred_name" data-sortable="true">Preferred Name</th>
        <th data-field="reg_datetime" data-sortable="true">Registration</th>
        <th data-field="admit_datetime" data-sortable="true">Admittance</th>
      </tr>
    </thead>
  </table>
</div>

<input id="token" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

@stop
