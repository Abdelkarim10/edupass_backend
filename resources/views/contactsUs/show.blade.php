@extends('layouts.app')
@section('content')
<div class="container">


    <div class="card" style="width:50% ;">
        <div class="card-body">

            <div class="card-body">
                <h5 class="card-title">Title : {{ $contactUs->title }}</h5>
                <p class="card-text">Content : {{ $contactUs->content }}</p>
                <p class="card-text">User name : <a href="/users/{{  $contactUs->user->id }}">{{ $contactUs->user->full_name }}</a>

            </div>

           

        </div>
    </div>



</div>
@endsection