@include('blank',['userInfo'=>$userInfo])
@extends('layouts.userlayout') <!-- Use your layout file as needed -->
@section('title', 'Home')
@section('content')
    <div>
        <h2>Profile</h2>
        <p>Last Name: {{ $userInfo->last_name }}</p>

        <!-- Add a logout link -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
@endsection
