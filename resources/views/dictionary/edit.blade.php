@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Editing Page</div>
    <div class="card-body">

        <form action="{{ url('dictionary/' .$dictionary->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <label>Word</label></br>
            <input type="text" name="word" id="name" value="{{$dictionary->word}}" class="form-control"></br>

            <label>Meaning</label></br>
            <input type="text" name="word" id="name" value="{{$dictionary->meaning}}" class="form-control"></br>



            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"></br>
        </form>

    </div>
</div>
@endsection