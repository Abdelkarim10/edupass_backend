@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Editing Page</div>
    <div class="card-body">

        <form action="{{ url('assessments/'.$assessment->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$assessment->id}}" id="id" />
            <label>Name</label></br>
            <input type="text" name="name" id="name" value="{{$assessment->name}}" class="form-control"></br>
            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"></br>
        </form>

    </div>
</div>
@endsection