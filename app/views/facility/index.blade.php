@extends('layouts.master')

@section('content')

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
  <button class="btn btn-default" data-toggle="modal" data-target="#deleteModal">
    <i class="glyphicon glyphicon-trash"></i> <span>Delete</span>
  </button>

</div>

<!--Table-->
<div id="list">
  <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-refresh="true" data-show-columns="true" data-toolbar="#toolbar" data-click-to-select="true">
    <thead>
      <tr>
        <th data-field="state" data-checkbox="true"></th>
        <th data-field="abbrev" data-sortable="true">Abbrev.</th>
        <th data-field="name" data-sortable="true">Name</th>
        <th data-field="type" data-sortable="true">Type</th>
        <th data-field="phone" data-sortable="true">Phone</th>
        <th data-field="address" data-sortable="true">Address</th>
        <th data-field="postal_code" data-sortable="true">Postal Code</th>
      </tr>
    </thead>
  </table>
</div>

<input id="token" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

@stop
