<!-- Add a Party Page -->

<!-- Use Main Template -->
@extends('templates.main')

<!-- Define Page Title  -->
@section('title')
Edit Party
@stop

<!-- Add Content for Page-->
@section('navigation')
<div class='col3'></div>
<div class='col5'>
    <a href='/members/dashboard' class='nav_link' >Cancel Changes</a>
</div>
@stop
@section('content')
    <div class='container'>
        <p>
            Use the form below to add a edit the party.
        </p>
        <div class='col6'>
            <div class='col4'>
                {{-- Edit Party Form ---------------------------------}}
                {{ Form::model($party, array('url' => 'members/edit', 'method' => 'POST')) }}
                {{ Form::hidden('id', $party->first()->id) }}

                {{-- Host Field --}}
                {{ Form::label('host', 'Host:') }}
                {{ Form::text('host') }}<br><br>

                {{-- Date Field ----------------------------------}}
                {{ Form::label('date', 'Date:') }}
                {{ Form::month(date('m', strtotime($party->first()->date))) }}<span class='error'>{{  $errors->first('month') }}</span>
                {{ Form::day(date('d', strtotime($party->first()->date))) }}<span class='error'>{{  $errors->first('day') }}</span>
                {{ Form::year(date('Y', strtotime($party->first()->date))) }}<span class='error'>{{  $errors->first('year') }}</span><br><br>

                {{-- Time of Party -------------------------------}}
                {{ Form::label('start_time', 'Start Time:') }}
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
                {{ Form::label('end_time', 'End Time:') }}
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
                {{ Form::text('name') }}
                <span class='error'>{{  $errors->first('name') }}</span><br><br>

                {{-- Party Theme Field ---------------------------}}
                {{ Form::label('theme', 'Theme:') }}
                {{ Form::text('theme') }}<br><br>

                {{-- Party Location Field ------------------------}}
                {{ Form::label('location', 'Location:') }}
                {{ Form::text('location') }}<br><br>

                {{-- Party Attire Field --------------------------}}
                {{ Form::label('attire', 'Attire:') }}
                {{ Form::text('attire') }}<br><br>

                {{-- Alcohol Field -------------------------------}}
                {{ Form::label('alcohol', 'Is Alcohol Provided?:') }}
                {{ Form::text('alcohol') }}<br><br>

                {{-- Items Provided Field --------------------}}
                {{ Form::label('provided_items', 'Items Provided by Host:') }}<br>
                {{ Form::textarea('provided_items') }}<br><br>
            </div>
        </div>    
        <div class='col6'>
            {{-- Form Submit Button --------------------------}}
            {{ Form::submit('Save Changes', array('class' => 'submit_button')) }}
        </div>
            {{-- Close Form --}}    
            {{ Form::close() }}
    </div>
@stop