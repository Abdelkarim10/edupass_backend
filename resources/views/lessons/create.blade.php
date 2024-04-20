@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Creating Lesson Page</div>
  <div class="card-body">

    <form action="{{ url('lessons') }}" method="post">
      {!! csrf_field() !!}
      <label>Name</label></br>
      <input type="text" name="name" id="name" class="form-control"></br>

      <input required name="course_id" value="{{$course_id}}" hidden id="course_id" style="width:30% ;height:30px;">
      <!-- <label>Assessments</label></br>
      <select required name="assessment_id" id="assessment_id" style="width:30% ;height:30px;">
        @foreach($assessments as $assessment)
        <option value="{{$assessment->id}}">{{$assessment->name}}</option>
        @endforeach
      </select></br></br> -->
      <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"></br>
    </form>

  </div>
</div>
@endsection