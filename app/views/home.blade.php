@extends('layouts/master')

@section('navbar')

{{Form::open(['route'=>'patient.search', 'class' => "navbar-form navbar-left"])}}
<div class="form-group">
  {{Form::text('keyword', null, ['placeholder' => 'Search for Record by PHN',  'class' => 'form-control', 'size' => '25'])}}
  {{Form::submit('Search', ['class' => 'btn btn-default'])}}
</div>
{{Form::close()}}

@stop

@section('content')

Welcome to the home page. To begin, please click on the tabs at the top.

Record: To create, edit, and delete medical records of patients related to your facility. You can also view the full patient's information.

Patient: To view the list of existing patients in your facility. Only the Admins have upload and export control functionalities.

User: To view the list of users, with the options to see their profiles, in addition to creating new, editing, and deleting new users (admins only).

Facility: The types of medical facility: Hospitals and medical clinics. This shows the list of facilities stored in the database, with the option to view, create, edit, and delete each facility.

Search: Allows users to comprehensively search for a specific record, patient, and/or medical doctor based on the field filled out in the records, patients, users, or facility options.

@stop
