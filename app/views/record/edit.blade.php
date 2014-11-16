@extends('layouts.default')

@section('content')
    <h1> Edit Patient</h1>

    {{ Form::model($record, ['method'=>'PUT', 'route'=>['record.update', $record->id]]) }}

        <div>
            <dt>{{ Form::label('notes', 'notes: ') }}</dt>
            <dd><div>{{ Form::text('notes' ) }}
                {{ $errors->first('notes') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('name', 'Full Name: ') }}</dt>
            <dd><div>{{ Form::input('text', 'name') }}
                {{ $errors->first('name') }}</div></dd>
       </div>

        <div>
            <dt>{{ Form::label('preferred_name', 'Preferred Name: ') }}</dt>
            <dd><div>{{ Form::input('text', 'preferred_name') }}
                {{ $errors->first('preferred_name') }}</div></dd>
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
            <dt>{{ Form::label('home_phone', 'Phone Number: ') }}</dt>
            <dd><div>{{ Form::text('home_phone' ) }}
                {{ $errors->first('home_phone') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('work_phone', 'Work phone Number: ') }}</dt>
            <dd><div>{{ Form::text('work_phone' ) }}
                {{ $errors->first('work_phone') }}</div></dd>
        </div>


        <div>
            <dt>{{ Form::label('mobile_phone', 'Mobile Phone Number: ') }}</dt>
            <dd><div>{{ Form::text('mobile_phone' ) }}
                {{ $errors->first('mobile_phone') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('emergency_name', 'Emergency Contact Name: ') }}</dt>
            <dd><div>{{ Form::text('emergency_name' ) }}
                {{ $errors->first('emergency_name') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('emergency_phone', 'Emergency Contact Phone Number: ') }}</dt>
            <dd><div>{{ Form::text('emergency_phone' ) }}
                {{ $errors->first('emergency_phone') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('emergency_relationship', 'Emergency Contact Relationship: ') }}</dt>
            <dd><div>{{ Form::text('emergency_relationship' ) }}
                {{ $errors->first('emergency_relationship') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('allergies', 'Allergies: ') }}</dt>
            <dd><div>{{ Form::text('allergies' ) }}
                {{ $errors->first('allergies') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('permanent_resident', 'Permanent Resident: ') }}</dt>
            <dd><div>{{ Form::text('permanent_resident' ) }}
                {{ $errors->first('permanent_resident') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('preferred_language', 'Preferred Language: ') }}</dt>
            <dd><div>{{ Form::text('preferred_language' ) }}
                {{ $errors->first('preferred_language') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('other_language', 'Other Language: ') }}</dt>
            <dd><div>{{ Form::text('other_language' ) }}
                {{ $errors->first('other_language') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('ethnic_background', 'Ethnic Background: ') }}</dt>
            <dd><div>{{ Form::text('ethnic_background' ) }}
                {{ $errors->first('ethnic_background') }}</div></dd>
        </div>

        <div>
            <dt>{{ Form::label('family_doctor', 'Family Doctor: ') }}</dt>
            <dd><div>{{ Form::text('family_doctor' ) }}
                {{ $errors->first('family_doctor') }}</div></dd>
        </div>

        <div>
            {{ Form::submit('Edit Contact', ['class' => 'btn btn-info'])}}
        </div>

    {{ Form::close() }}
@stop
