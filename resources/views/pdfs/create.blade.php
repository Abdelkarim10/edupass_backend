@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Creating PDF Page</div>
    <div class="card-body">



        <form action="{{ url('pdfs') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <label> File name</label></br>
            <input type="file_name" name="file_name" id="file_name" class="form-control"><br>

            <input required name="lesson_id" value="{{$lesson_id}}" hidden id="lesson_id" style="width:30% ;height:30px;">

            <label for="pdf">Choose PDF</label></br>
            <input type="file" accept="application/pdf" name="pdf"></br></br>
            <input type="submit" value="Save" class="btn btn-success"style="background-color: #224C69 ;"> </br>
        </form>

    </div>
</div>
@endsection
<!-- //mime type -->
