@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Creating Mcqs Page</div>
    <div class="card-body">



        <form action="{{ url('mcqs') }}" method="post" enctype="multipart/form-data" >
            {!! csrf_field() !!}
            <label>Question</label></br>
            <input type="text" name="question" id="question" class="form-control"><br>

            <input required name="assessment_id" value="{{$assessment_id}}" hidden id="assessment_id" style="width:30% ;height:30px;">

            <label>Mcq Pic</label></br>
            <input type="file" name="mcq_pic" id="mcq_pic" class="form-control"></br>

            <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"> </br>
        </form>

    </div>
</div>
@endsection