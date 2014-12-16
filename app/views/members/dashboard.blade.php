<!-- Member's Dashboard -->

<!-- Use Main Template -->
@extends('templates.main')

<!-- Define Page Title  -->
@section('title')
Member Dashboard
@stop

<!-- Add Content for Page-->
@section('navigation')
<div class='col3'></div>
<div class='col5'>
    <a href='/members/add' class='nav_link' >Add a Party</a>
    <a href='/auth/logout' class='nav_link' >Logout</a>
</div>
@stop
@section('content')
    <div class='container'>
        <div class='col1'>
            @if(!empty($parties))
            <div class='parties'>
                <p>
                    Welcome to your dashboard. Here you can add a new party,
                    invite people to your party page,
                    edit/manage your existing parties, and delete the parties
                    that have already expired.
                </p>
                <table>
                    <tr>
                        <th>Party Websites</th>
                        <th>Actions</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($parties as $party)
                    <tr>
                        <td><a href='{{'/party/' . $party->website }}' target='blank'>{{ $party->name }}</a></td>
                        <td>
                            <a href='/members/edit/{{$party->id}}'>Edit</a>
                            <a href='/members/invite/{{$party->id}}'>Invite Guests</a>
                            <a href='/members/delete/{{$party->id}}'>Delete</a>
                        </td>
                        <td>
                            @if ($today > $party->date)
                                {{ 'Expired' }}
                            @else
                                {{ 'Active' }}
                            @endif    
                        </td>
                    </tr>
                    @endforeach 
            </table>
            </div>
        @else
            <p>You have no parties.</p>
        @endif  
        </div>  
    </div>
@stop