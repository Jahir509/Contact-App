@extends('layouts.main')
@section('title','Homepage')
@section('content')
<div class="flex-center position-ref full-height py-5">
    <div class="content text-center">
        <div class="title m-b-md">
           <h1>Laravel</h1>
        </div>

        <div class="links">
            @auth
                <a href="{{ route('contacts.index')}}">All Contacts</a>
                <a href="{{ route('contacts.create')}}">Create Contact</a>
                <a href="{{ route('contacts.show',1)}}">Contact 1</a>
            @endauth
        </div>
    </div>
</div>
@endsection