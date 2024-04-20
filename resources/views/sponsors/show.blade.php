@extends('layouts.app')
@section('content')
<div class="container">


    <div class="card" style="width:50% ;">
        <div class="card-body">
            <img src="{{ env('url') . '/public/assets/sponsors_pics/' .   $sponsor->image }}" width='50' height='50' class="img img-responsive" />
            <div class="card-body">
                <h5 class="card-title">Name : {{ $sponsor->name }}</h5>
                <p class="card-text">Description : {{ $sponsor->description }}</p>
                <p class="card-text">Image : {{ $sponsor->image }}</p>
                <p class="card-text">Link : <a href="{{ $sponsor->link }}">{{ $sponsor->link }}</a> 
            </div>

            </hr>

        </div>
    </div>



</div>
@endsection