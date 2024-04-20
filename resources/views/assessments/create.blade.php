@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Assessments Page</div>
  <div class="card-body">

    <form action="{{ url('assessments') }}" method="post">
      {!! csrf_field() !!}
      <label>Name</label></br>
      <input type="text" name="name" id="name" class="form-control"></br>

      @if(isset($course_id))
      <input type="number" name="course_id" hidden value="{{$course_id}}"></br>
      @else
      <input type="number" name="lesson_id" hidden value="{{$lesson_id}}"></br>
      @endif
      <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"></br>

    </form>

  </div>

</div>
@endsection