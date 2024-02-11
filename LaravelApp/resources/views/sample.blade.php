@extends('layout')
@section('title', 'Registration')
@section('content')

<h1>User Info</h1>

<ul>
    @foreach($userInfo as $user)
        <li>
            First Name: {{ $user->first_name }}, Last Name: {{ $user->last_name }}
        </li>
    @endforeach
</ul>

@endsection