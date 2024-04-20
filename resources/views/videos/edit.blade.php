@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Editing Page</div>
    <div class="card-body">

        <form action="{{ url('videos/' .$video->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$video->id}}" id="id" />
            <label>link</label></br>
            <input type="text" name="link" id="link" value="{{$video->link}}" class="form-control"></br>

           

            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>

    </div>
</div>
@endsection