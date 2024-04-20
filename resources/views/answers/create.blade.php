@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Creating Answers Page</div>
    <div class="card-body">


        <form action="{{ url('answers') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <label>Text</label></br>
            <input type="text" name="text" id="text" class="form-control"><br>

            <input required name="mcq_id" value="{{$mcq_id}}" hidden id="mcq_id" style="width:30% ;height:30px;">


            <input type="submit" value="Add" class="btn btn-success" style="background-color: #224C69 ;"> </br>
        </form>

    </div>
</div>
@endsection