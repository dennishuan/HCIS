
@extends('layouts.master')

@section('content')

<div>
{{ link_to_route('file/upPat', 'UPLOADPATIENTS', null, ['class' => 'btn btn-default']) }}
{{ link_to_route('file/exportPat', 'EXPORTPATIENTS', null, ['class' => 'btn btn-default']) }}
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="deleteModalLabel">Confirm Deletion</h4>
      </div>
      <div class="modal-body">
          <p>Do you want to delete the selected entry?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="delete">Confirm</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog">                                                   $
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="uploadModalLabel">Upload Patient Files</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
		<label for = "file" class = "col-lg-2 control-label">File:</label>
		<div class = "col-lg-10">
			<input type = "text" class = "form-control" id = "data" placeholder = "???">
		</div>
	  </div>
      </div>	
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal" id="upload">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
  <div class="modal-dialog">                                                   $
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exportModalLabel">Confirm Export</h4>
      </div>
      <div class="modal-body">
          <p>Do you want to export patient profiles?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="export">confirm</button>
      </div>
    </div>
  </div>
</div>

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
  @if (Auth::user() != null && Auth::user()->isAdmin())
  <button class="btn btn-default" data-toggle="modal" data-target="#deleteModal">
    <i class="glyphicon glyphicon-trash"></i> <span>Delete</span>
  </button>
  <button class="btn btn-default" data-toggle="modal" data-target="#uploadModal">
    <i class="glyphicon glyphicon-upload"></i> <span>Upload</span>
  </button>
  <button class="btn btn-default" data-toggle="modal" data-target="#exportModal">
    <i class="glyphicon glyphicon-download"></i> <span>Export</span>
  </button>
  @endif

</div>



<!--Table-->
<div id="list">
  <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-refresh="true" data-show-columns="true" data-toolbar="#toolbar" data-click-to-select="true">
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

