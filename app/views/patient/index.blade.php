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
  <button class="btn btn-default" id="delete" data-toggle="modal" data-target="#confirmModal">
    <i class="glyphicon glyphicon-trash"></i> <span>Delete</span>
  </button>

<!-- Link to file upload --->
<div> {{ link_to('addfile', 'UploadPatient') }}</div>  
  
</div>
<!--Confirmation Modal-->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
	<h1>Are you sure?</h1>
	</div>
     <div class="modal-body">

     </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	<a href="#" class="btn btn-danger danger">Delete</a>
     </div>
   </div>
  </div>
</div>


<!--Table-->
<div id="list">
  <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-refresh="true" data-show-columns="true" data-toolbar="#toolbar">
    <thead>
      <tr>
        <th data-field="state" data-checkbox="true"></th>
        <th data-field="phn" data-sortable="true">Personal Health #</th>
        <th data-field="name" data-sortable="true">Full Name</th>
        <th data-field="preferred_name" data-sortable="true">Preferred Name</th>
        <th data-field="sex" data-sortable="true">Sex</th>
        <th data-field="date_of_birth" data-sortable="true">Date of Birth</th>
      </tr>
    </thead>
  </table>
</div>

<input id="token" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

@stop

