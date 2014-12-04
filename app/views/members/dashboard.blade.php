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
            <table>
                @foreach ($parties as $party)
                <tr>
                    <td><a href='{{'/party/' . $party->website }}' target='blank'>{{ $party->name }}</a></td>
                </tr>
                @endforeach 
            </table>
        @else
            <p>You have no parties.</p>
        @endif    
    </div>
    <div>
        <a href='/members/add'>Add a Party</a>
    </div>
@stop