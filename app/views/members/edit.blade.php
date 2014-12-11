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
        {{-- Edit Party Form --}}
        {{ Form::open(array('url' => 'members/edit', 'method' => 'POST')) }}
        
            {{-- Host Field --}}
            {{ Form::label('host', 'Host:') }}
            {{ Form::text('host', $party->first()->host or null) }}<br>
            
            {{-- Party Name Field --}}
            {{ Form::label('name', 'Party Name:') }}
            {{ Form::text('name', $party->first()->name or null) }}<br>
            
            {{-- Party Theme Field --}}
            {{ Form::label('theme', 'Theme:') }}
            {{ Form::text('theme', $party->first()->theme or null) }}<br>
            
            {{-- Party Location Field --}}
            {{ Form::label('location', 'Location:') }}
            {{ Form::text('location', $party->first()->location or null) }}<br>
            
            {{-- Party Attire Field --}}
            {{ Form::label('attire', 'Attire:') }}
            {{ Form::text('attire', $party->first()->attire or null) }}<br>
            
            {{-- Alcohol Field --}}
            {{ Form::label('alcohol', 'Is Alcohol Provided?:') }}
            {{ Form::text('alcohol', $party->first()->alcohol or null) }}<br><br>
            
            <div>
                {{-- Items Provided Field --}}
                {{ Form::label('provided_items', 'Items Provided by Host:') }}
                {{ Form::text('provided_items', $party->first()->provided_items or null) }}
            </div>
        {{-- Close Form --}}    
        {{ Form::close() }}
    </div>
@stop