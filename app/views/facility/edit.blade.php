@extends('layouts.default')

@section('content')
    <h1> Edit Facility</h1>

    {{ Form::model($facility, ['method'=>'PUT', 'route'=>['facility.update', $facility->id]]) }}

        <div>
            <dt>{{ Form::label('name', 'Facility Name: ') }}</dt>
            <dd><div>{{ Form::text('name' ) }}
                {{ $errors->first('name') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('abbrev', 'Facility Abbreviation: ') }}</dt>
            <dd><div>{{ Form::text('abbrev') }}
                {{ $errors->first('abrev') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('type', 'Facility Type: ') }}</dt>
            <dd><div>{{ Form::input('enum', 'type') }}
                {{ $errors->first('type') }}</div></dd>
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
