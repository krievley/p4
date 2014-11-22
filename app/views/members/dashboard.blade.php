<!-- Member's Dashboard -->


<!-- Use Main Template -->
@extends('templates.main')

<!-- Define Page Title  -->
@section('title')
Member Dashboard
@stop

<!-- Add Content for Page-->
@section('content')
    <div>
        <h2>You have successfully logged in!</h2>
        {{ link_to('auth/logout', 'Logout') }}
    </div>
@stop