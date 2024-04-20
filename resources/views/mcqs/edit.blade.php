@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Editing Page</div>
    <div class="card-body">

        <form action="{{ url('mcqs/' .$mcq->id) }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$mcq->id}}" id="id" />
            <label>Question</label></br>
            <input type="text" name="question" id="question" value="{{$mcq->question}}" class="form-control"></br>

            <label>MCQ Picture</label>
            <input type="file" name="mcq_pic" id="mcq_pic" value="{{$mcq->mcq_pic}}" class="form-control"></br>

            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"></br>
        </form>

    </div>
</div>
@endsection