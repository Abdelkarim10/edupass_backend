@extends('layouts.app')
@section('content')

<div style="width:50%;">
    <a href="/courses/{{$lesson->course->id}}" class="btn btn-primary" style="background-color: #224C69 ;">
        Back</a>
</div>
<div class="container" style="width:80%;margin:auto ;">
    <div style="width:95%;margin:auto">
        @if($lesson->assessment_id == null)
        <a href="{{ route('assessment.lesson.create',['lesson_id'=>$lesson->id]) }}" class="btn btn-success btn-sm" title="Add New Course" style="width:20%; height: 20%;font-weight:500">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Assessemnt
        </a>
        @else


        <p style="font-weight:600">Assessment of {{$lesson->name}}</p>
        <a class="btn btn-info btn-sm" href="{{ route('assessments.show',$lesson->assessment_id) }}" title="View Assessment"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
        <a class="btn btn-primary btn-sm" href="{{ route('assessments.edit',$lesson->assessment_id) }}" title="Edit  Assessment"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
        <form method="POST" action="{{ route('assessments.destroy',$lesson->assessment_id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete  Assessment" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>


            @endif
    </div>
    <br> <br>

    <div class="row">
        <div class="col-sm">
            @include("dictionary.index",["dictionaries" => $lesson->dictionaries,"lesson" => $lesson]) <br>

        </div>
        <div class="col-sm">
            @include("pdfs.index",["pdfs" => $lesson->pdfs,"lesson_id" => $lesson->id]) <br>
        </div>
        <div class="col-sm">
            @include("videos.index",["videos" => $lesson->videos,"lesson" => $lesson])
        </div>
    </div>
</div>

@endsection