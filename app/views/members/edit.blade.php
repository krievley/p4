<!-- Add a Party Page -->

<!-- Use Main Template -->
@extends('templates.main')

<!-- Define Page Title  -->
@section('title')
Edit Party
@stop

<!-- Add Content for Page-->
@section('content')
    <div>
        {{-- Edit Party Form ---------------------------------}}
        {{ Form::model($party, array('url' => 'members/edit', 'method' => 'POST')) }}
        {{ Form::hidden('id', $party->first()->id) }}
        
            {{-- Host Field --}}
            {{ Form::label('host', 'Host:') }}
            {{ Form::text('host') }}<br>
            
            {{-- Date Field ----------------------------------}}
            {{ Form::label('date', 'Date:') }}<br>
            {{ Form::month(date('m', strtotime($party->first()->date))) }}
            {{ Form::day(date('d', strtotime($party->first()->date))) }}
            {{ Form::year(date('Y', strtotime($party->first()->date))) }}<br>
            
            {{-- Time of Party -------------------------------}}
            {{ Form::label('start_time', 'Start Time: ' . $party->first()->start_time) }}<br>
            <select id="start_hour" name="start_hour">
                {{ Form::hour(substr($party->first()->start_time, 0, 2)) }}
            </select>
            :
            <select id="start_minute" name="start_minute">
                {{ Form::minute(substr($party->first()->start_time, 3, 5)) }}
            </select>
            {{ Form::select('start_ampm', array('am' => 'am',
                                                'pm' => 'pm'), substr($party->first()->start_time, -2)) }}
            <br><br>
            {{ Form::label('end_time', 'End Time: ' . $party->first()->end_time) }}<br>
            <select id="end_hour" name="end_hour">
                {{ Form::hour(substr($party->first()->end_time, 0, 2)) }}
            </select>
            :
            <select id="end_minute" name="end_minute">
                {{ Form::minute(substr($party->first()->end_time, 3, 5)) }}
            </select>
            {{ Form::select('end_ampm', array('am' => 'am',
                                                'pm' => 'pm'), substr($party->first()->end_time, -2)) }}
            <br><br>
        
            {{-- Party Name Field ----------------------------}}
            {{ Form::label('name', 'Party Name:') }}
            {{ Form::text('name') }}<br>
            
            {{-- Party Theme Field ---------------------------}}
            {{ Form::label('theme', 'Theme:') }}
            {{ Form::text('theme') }}<br>
            
            {{-- Party Location Field ------------------------}}
            {{ Form::label('location', 'Location:') }}
            {{ Form::text('location') }}<br>
            
            {{-- Party Attire Field --------------------------}}
            {{ Form::label('attire', 'Attire:') }}
            {{ Form::text('attire') }}<br>
            
            {{-- Alcohol Field -------------------------------}}
            {{ Form::label('alcohol', 'Is Alcohol Provided?:') }}
            {{ Form::text('alcohol') }}<br><br>
            
            <div>
                {{-- Items Provided Field --------------------}}
                {{ Form::label('provided_items', 'Items Provided by Host:') }}
                {{ Form::textarea('provided_items') }}
            </div>
            {{-- Form Submit Button --------------------------}}
            {{ Form::submit('Save Changes', array('class' => 'name')) }}
        {{-- Close Form --}}    
        {{ Form::close() }}
    </div>
@stop