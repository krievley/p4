<!-- Add a Party Page -->

<!-- Use Main Template -->
@extends('templates.main')

<!-- Define Page Title  -->
@section('title')
Add a Party
@stop

<!-- Add Content for Page-->
@section('content')
<div>
    {{ Form::open(array('url' => 'members/add', 'method' => 'POST')) }}
    
        {{-- Name of Party -------------------------------}}
        {{ Form::label('name', 'Name of Party') }}<br>
        {{ Form::text('name') }}
        <br><br>
        {{-- Date of Party -------------------------------}}
        {{ Form::label('date', 'Date') }}<br>
        {{ Form::month() }}
        {{ Form::day() }}
        {{ Form::year() }}
        <br><br>
        {{-- Time of Party -------------------------------}}
        {{ Form::label('start_time', 'Start Time') }}<br>
        <select id="start_hour" name="start_hour">
            {{ Form::hour() }}
        </select>
        :
        <select id="start_minute" name="start_minute">
            {{ Form::minute() }}
        </select>
        {{ Form::select('start_ampm', array('am' => 'am',
                                            'pm' => 'pm')) }}
        <br><br>
        {{ Form::label('end_time', 'End Time') }}<br>
        <select id="end_hour" name="end_hour">
            {{ Form::hour() }}
        </select>
        :
        <select id="end_minute" name="end_minute">
            {{ Form::minute() }}
        </select>
        {{ Form::select('end_ampm', array('am' => 'am',
                                            'pm' => 'pm')) }}
        <br><br>
        {{-- Host of Party -------------------------------}}
        {{ Form::label('host', 'Host') }}<br>
        {{ Form::text('host') }}
        <br><br>
        {{-- Choose Theme --------------------------------}}
        {{ Form::label('theme', 'Theme') }}<br>
        {{ Form::text('theme') }}
        <br><br>
        {{-- List the Item Provided by Host --------------}}
        {{ Form::label('items', 'Items Provided by Host') }}<br>
        {{ Form::textarea('items') }}
        <br><br>
        {{-- Location ------------------------------------}}
        {{ Form::label('location', 'Location') }}<br>
        {{ Form::text('location') }}
        <br><br>
        {{-- Party Attire --------------------------------}}
        {{ Form::label('attire', 'Party Attire') }}<br>
        {{ Form::text('attire') }}
        <br><br>
        {{-- Alcohol Preference --------------------------}}
        {{ Form::label('alcohol', 'Will there be alcohol?') }}<br>
        {{ Form::select('alcohol', array('yes' => 'Yes - Provided by Host',
                                            'byob' => 'Yes - BYOB',
                                            'no' => 'No')) }}
        <br><br>                                    
        {{-- Submit Form ---------------------------------}}
        {{ Form::submit('Submit') }}
    {{ Form::close() }}    
</div>
@stop

