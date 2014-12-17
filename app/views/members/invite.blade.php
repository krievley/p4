<!-- Invite Guests Page -->

<!-- Use Main Template -->
@extends('templates.main')

<!-- Define Page Title  -->
@section('title')
Invite Guests
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
        Use the form below to send invites to your party page.
        Or, just copy the web site link and send it to your friends.
    </p>
    <div class='col6'>
        <div class='col4'>
            {{-- Invite Guest Form --}}
            {{ Form::open(array('url' => 'members/invite', 'method' => 'POST')) }}
            {{ Form::hidden('id', $party->id) }}

                {{-- Website Field --}}
                {{ Form::label('website', 'Your party website URL:') }}<br>
                {{ Form::text('website', '/party/' . $party->website, array('class' => 'web')) }}<br><br>

                {{-- Email to Field --}}
                {{ Form::label('to', 'To:') }}
                {{ Form::text('to') }}<span class='error'>{{  $errors->first('to') }}</span><br><br>

                {{-- Email from Field --}}
                {{ Form::label('from', 'From:') }}
                {{ Form::text('from') }}<span class='error'>{{  $errors->first('from') }}</span><br><br>

                {{-- Subject Field --}}
                {{ Form::label('subject', 'Subject:') }}
                {{ Form::text('subject', $party->first()->name) }}<span class='error'>{{  $errors->first('subject') }}</span><br><br>

                {{-- Message Field --}}
                {{ Form::label('message', 'Message:') }}<br>
                {{ Form::textarea('message') }}<br>
                <span class='error'>{{  $errors->first('message') }}</span><br>

                <div class='col6'>
                    {{-- Form Submit --}}
                    {{ Form::submit('Send', array('class' => 'submit_button')) }}
                </div>

            {{-- Close Form --}}   
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop