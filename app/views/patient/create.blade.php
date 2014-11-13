@extends('layouts.default')

@section('content')
    <h1> Create New Patient</h1>

    {{ Form::open(['route' => 'patient.store']) }}

        <div>
            <dt>{{ Form::label('phn', 'Personal Health Number: ') }}</dt>
            <dd><div>{{ Form::text('phn' ) }}
                {{ $errors->first('phn') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('name', 'Full Name: ') }}</dt>
            <dd><div>{{ Form::input('text', 'name') }}
                {{ $errors->first('name') }}</div></dd>
       </div>

        <div>
            <dt>{{ Form::label('sex', 'Sex: ') }}</dt>
            <dd><div>{{ Form::text('sex' ) }}
                {{ $errors->first('sex') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('date_of_birth', 'Date of Birth: ') }}</dt>
            <dd><div>{{ Form::text('date_of_birth' ) }}
                {{ $errors->first('date_of_birth') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('address', 'Address: ') }}</dt>
            <dd><div>{{ Form::text('address' ) }}
                {{ $errors->first('address') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('postal_code', 'Postal Code: ') }}</dt>
            <dd><div>{{ Form::text('postal_code' ) }}
                {{ $errors->first('postal_code') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('phone', 'Phone Number: ') }}</dt>
            <dd><div>{{ Form::text('phone' ) }}
                {{ $errors->first('phone') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('family_doctor', 'Family Doctor: ') }}</dt>
            <dd><div>{{ Form::text('family_doctor' ) }}
                {{ $errors->first('family_doctor') }}</div></dd>
        </div>
        <div>
            {{ Form::submit('Create Patient')}}
        </div>

    {{ Form::close() }}
@stop
