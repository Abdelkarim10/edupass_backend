@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Editing Page</div>
    <div class="card-body">

        <form action="{{ url('courses/' .$course->id) }}" method="post" enctype="multipart/form-data"> 
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$course->id}}" id="id" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$course->name}}" class="form-control"></br>

            <label>Grade name</label></br>
            <select required type="name" name="grade_id" id="grade_id" style="width:30% ;height:30px;">
                @foreach($grades as $grade)
                <option value="{{$grade->id}}">{{$grade->name}}</option>
                @endforeach
            </select></br></br>

            <label>Course Picture</label>
            <input type="file" name="course_pic" id="course_pic" value="{{$course->course_pic}}" class="form-control"></br>


            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"></br>
        </form>

    </div>
</div>
@endsection