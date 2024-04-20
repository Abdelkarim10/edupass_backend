@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Creating Course Page</div>
    <div class="card-body">

        <form action="{{ url('courses') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <label>Name</label></br>
            <input type="text" name="name" id="name" class="form-control"></br>

            <input required name="grade_id" value="{{$grade->id}}" hidden id="grade_id" style="width:30% ;height:30px;">
            </input>

            <label>Course Pic</label></br>
            <input type="file" name="course_pic" id="course_pic" class="form-control"></br>

            <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"></br>
        </form>

    </div>
</div>
@endsection