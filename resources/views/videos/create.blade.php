@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Creating Video Page</div>
    <div class="card-body">



        <form action="{{ url('videos') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <label> Link </label></br>
            <input type="string" name="link" id="link" class="form-control"><br>

            <input required name="lesson_id" value="{{$lesson_id}}" hidden id="lesson_id" style="width:30% ;height:30px;">

            <input type="submit" value="Save" class="btn btn-success"> </br>
        </form>

    </div>

</div>
<div>

</div>
@endsection