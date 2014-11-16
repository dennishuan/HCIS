@extends('layouts.default')

@section('content')
    <h1> Edit Facility</h1>

    {{ Form::model($facility, ['method'=>'PUT', 'route'=>['facility.update', $facility->id]]) }}

        <div>
            <dt>{{ Form::label('facility_name', 'Facility Name: ') }}</dt>
            <dd><div>{{ Form::text('facility_name' ) }}
                {{ $errors->first('facility_name') }}</div></dd>
        </div>

		<div>
            <dt>{{ Form::label('facility_abbrev', 'Facility Abbreviation: ') }}</dt>
            <dd><div>{{ Form::text('facility_abbrev') }}
                {{ $errors->first('facility_abrev') }}</div></dd>
		</div>
		
		<div>
            <dt>{{ Form::label('facilitytype', 'Facility Type: ') }}</dt>
            <dd><div>{{ Form::input('enum', 'facilitytype') }}
                {{ $errors->first('facilitytype') }}</div></dd>
		</div>
		
		<div>
            <dt>{{ Form::label('phone', 'Phone Number: ') }}</dt>
            <dd><div>{{ Form::text('phone') }}
                {{ $errors->first('phone') }}</div></dd>
		</div>
		
		
		<div>
            <dt>{{ Form::label('address', 'Address: ') }}</dt>
            <dd><div>{{ Form::text('address') }}
                {{ $errors->first('address') }}</div></dd>
		</div>
		
        <div>
            <dt>{{ Form::label('postal_code', 'Postal Code: ') }}</dt>
            <dd><div>{{ Form::text('postal_code') }}
                {{ $errors->first('postal_code') }}</div></dd>
		</div>

        <div>
            {{ Form::submit('Edit Contact', ['class' => 'btn btn-info'])}}
        </div>

    {{ Form::close() }}
@stop
