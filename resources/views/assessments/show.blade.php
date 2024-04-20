@extends('layouts.app')
@section('content')

@include("mcqs.index",[
"assessment" => $assessment,
"mcqs" => $assessment->mcqs
])

@endsection