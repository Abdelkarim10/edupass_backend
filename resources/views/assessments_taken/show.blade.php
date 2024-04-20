@extends('layouts.app')
@section('content')
<div style="width:50%;">
    <a href="/users/{{$assessment_taken->user->id}}" class="btn btn-primary">
        Back</a>
</div>
@if($assessment_taken->mcqsTakens != null)
<div class="card shadow m-4 p-4">
    @foreach($assessment_taken->mcqsTakens as $mcq_taken)
    <h2> {{$mcq_taken->mcq->question}} </h2>
    <ul>
        @foreach($mcq_taken->mcq->answers as $answer)
        <li style="color: @if($mcq_taken->answer_id == $answer->id) @if($answer->right_answer == 1) green @else red @endif @else @if($answer->right_answer == 1) green @endif @endif"> {{$answer->text}} </li>
        @endforeach
    </ul>
    @endforeach
</div>
@endif

@endsection