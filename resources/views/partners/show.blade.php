@extends('layouts.app')
@section('content')
<div class="container">


    <div class="card" style="width:50% ;">
        <div class="card-body">
            <img src="{{ env('url') . '/public/assets/partners_pics/' .   $partner->image }}" width='50' height='50' class="img img-responsive" />
            <div class="card-body">
                <h5 class="card-title">Name : {{ $partner->name }}</h5>
                <p class="card-text">Description : {{ $partner->description }}</p>
                <p class="card-text">Image : {{ $partner->image }}</p>
                <p class="card-text">Link :  <a href="{{ $partner->link }}">{{ $partner->link }}</a> 
            </div>

            </hr>

        </div>
    </div>



</div>
@endsection