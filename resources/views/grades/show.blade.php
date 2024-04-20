@extends('layouts.app')
@section('content')

@include("courses.index",[
"courses" => $grade->courses,
"grade_id" => $grade
])

@endsection