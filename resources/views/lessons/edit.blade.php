@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Editing Page</div>
    <div class="card-body">

        <form action="{{ url('lessons/' .$lesson->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$lesson->id}}" id="id" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$lesson->name}}" class="form-control"></br>
            
            <label>Grade name</label></br>
            <select required name="grade_id" id="grade_id" style="width:30% ;height:30px;">
                @foreach($grades as $grade)
                <option value="{{$grade->id}}">{{$grade->name}}</option>
                @endforeach
            </select></br></br>
           
            <label>Course name</label></br>
            <select required name="course" id="course" style="width:30% ;height:30px">
                @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select></br></br>
           
            <label>Assessment name</label></br>
            <select required name="assessment_id" id="assessment_id" style="width:30% ;height:30px">
                @foreach($assessments as $assessment)
                <option value="{{$assessment->id}}">{{$assessment->name}}</option>
                @endforeach
            </select></br></br>
            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"></br>
        </form>

    </div>
</div>
@endsection