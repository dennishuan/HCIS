@extends('layouts.master')

@section('navbar')

{{Form::open(['route'=>'user.search', 'class' => "navbar-form navbar-left form-inline"])}}
<div class="form-group">
    {{Form::text('keyword', null, ['placeholder' => 'Search for Username',  'class' => 'form-control', 'size' => '25'])}}
</div>
{{Form::submit('Search', ['class' => 'btn btn-default'])}}
{{ link_to_route('user.create', 'new User', [], ['class' => 'btn btn-info']) }}

{{Form::close()}}

@stop


@section('content')

<!--Button-->
<div id="toolbar" class="btn-group btn-default">
    <button class="btn btn-default" id="edit">
        <i class="glyphicon glyphicon-edit"></i> <span>Edit</span>
    </button>
    <button class="btn btn-default" id="delete">
        <i class="glyphicon glyphicon-trash"></i> <span>Delete</span>
    </button>
</div>

<!--Table-->
<table id="table" data-toggle="table" data-url="user" data-search="true" data-pagination="true" data-show-refresh="true" data-show-columns="true" data-click-to-select="true" data-toolbar="#toolbar">
    <thead>
        <tr>
            <th data-field="state" data-checkbox="true"></th>
            <th data-field="username">Username</th>
            <th data-field="type">Type</th>
            <th data-field="name">Name</th>
            <th data-field="email">Email</th>
            <th data-field="phone">Phone Number</th>
        </tr>
    </thead>
</table>

@stop


