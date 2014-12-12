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
        {{ link_to('members/add', 'Add a Party') }}
    </div>
    <div>
        @if(!empty($parties))
            <table>
                <thead>
                    <tr>
                        <th>Party Websites</th>
                        <th>Actions</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @foreach ($parties as $party)
                <tr>
                    <td><a href='{{'/party/' . $party->website }}' target='blank'>{{ $party->name }}</a></td>
                    <td>
                        <a href='/members/edit/{{$party->id}}'>Edit</a>
                        <a href='#'>Invite Guests</a>
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
        @else
            <p>You have no parties.</p>
        @endif    
    </div>
@stop