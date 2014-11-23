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
        {{ link_to('auth/logout', 'Logout') }}
    </div>
    <div>
        @if(!empty($parties))
            <ul>
                @foreach ($parties as $party)
                <li>
                    <a href='{{ $party->first()->website }}'></a>
                </li>
                @endforeach 
            </ul>
        @else
            <p>You have no parties.</p>
        @endif    
    </div>
    <div>
        <a href='/members/add'>Add a Party</a>
    </div>
@stop