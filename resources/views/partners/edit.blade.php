@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Editing Page</div>
    <div class="card-body">

        <form action="{{ url('partners/' .$partner->id)  }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            @method("PATCH")

            <label>Name</label></br>
            <input type="text" name="name" id="name"  value="{{$partner->name}}" class="form-control"></br>
            <label>Description</label></br>
            <input type="text" name="description" id="description"  value="{{$partner->description}}" class="form-control"></br>
            <label>Link</label></br>
            <input type="text" name="link" id="link"  value="{{$partner->link}}" class="form-control"></br>
            <label>Image</label></br>
            <input type="file" name="image"  id="image" class="form-control"></br></br>


            <input type="submit" value="Update" class="btn btn-success" style="background-color: #224C69 ;"></br>
        </form>

    </div>
</div>
@endsection