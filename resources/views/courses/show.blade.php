@extends('layouts.app')
@section('content')


        
            @include("lessons.index",[
            "lessons" => $course->lessons,
            "course" => $course
           
             ])
       

       
        
        

@endsection