<!-- Invite Guests Page -->

<!-- Use Main Template -->
@extends('templates.main')

<!-- Define Page Title  -->
@section('title')
Invite Guests
@stop

<!-- Add Content for Page-->
@section('content')
<div>
    
</div>
<div>
    {{-- Invite Guest Form --}}
    {{ Form::open(array('url' => 'members/invite', 'method' => 'POST')) }}
    {{ Form::hidden('id', $party->id) }}
        
        {{-- Website Field --}}
        {{ Form::label('website', 'Your party website URL:') }}
        {{ Form::text('website', '/party/' . $party->website) }}<br>
    
        {{-- Email to Field --}}
        {{ Form::label('to', 'To:') }}
        {{ Form::text('to') }}<br>
        
        {{-- Email from Field --}}
        {{ Form::label('from', 'From:') }}
        {{ Form::text('from') }}<br>
        
        {{-- Subject Field --}}
        {{ Form::label('subject', 'Subject:') }}
        {{ Form::text('subject', $party->first()->name) }}<br>
        
        {{-- Message Field --}}
        {{ Form::label('message', 'Message:') }}
        {{ Form::textarea('message') }}<br>
        
        {{-- Form Submit --}}
        {{ Form::submit('Send', array('class' => 'name')) }}
        
    {{-- Close Form --}}   
    {{ Form::close() }}
</div>
@stop