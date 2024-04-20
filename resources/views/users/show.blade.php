@extends('layouts.app')
@section('content')










<div class="container">


    <div class="card" style="width:50% ;">
        <div class="card-body">
            <img src="{{ env('url') . '/public/assets/profile_pics/' .   $user->profile_pic }}" width='50' height='50' class="img img-responsive" />
            <div class="card-body">
                <h5 class="card-title">Name : {{ $user->full_name }}</h5>
                <p class="card-text">Address : {{ $user->email }}</p>
                <p class="card-text">Mobile : {{ $user->phone_number }}</p>
                <p class="card-text">Country : {{ $user->country->name[App::getLocale()] }}</p>
                <p class="card-text">Governorate : {{ $user->governorate->name[App::getLocale()] }}</p>
                <p class="card-text">District : {{ $user->district->name[App::getLocale()] }}</p>
                <p class="card-text">City : {{ $user->city->name[App::getLocale()] }}</p>
                <p class="card-text">Nationality : {{ $user->nationality->name[App::getLocale()] }}</p>
                <p class="card-text">School : {{ $user->school }}</p>
                <p class="card-text">Grade : {{ $user->grade->name }}</p>
                <p class="card-text">Date of birth : {{ $user->date_of_birth }}</p>
            </div>

            </hr>

        </div>
    </div>



</div>

<br> <br>

@include("assessments_taken.index",[
"assessments_taken" => $user->assessmentTakens,
"user" => $user
])

<br> <br>

@include("chats.index",[
"chats" => $user->chats,
"user" => $user
])
<br> <br>

<br>
<div class="row" style="width:85% ;margin:auto">
    <label style="padding: 0;">Notification:</label>
    <input type="text" style="width:25% ;height:25px;margin-right:5px;">
    <button type="submit" class="btn btn-primary" style="width:5% ;height:30px;padding:0;">Notify</button>
</div>
@endsection
