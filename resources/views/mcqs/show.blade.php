@extends('layouts.app')
@section('content')




@include("answers.index",[
"answers" => $mcq->answers,
"mcq" => $mcq
])

@endsection