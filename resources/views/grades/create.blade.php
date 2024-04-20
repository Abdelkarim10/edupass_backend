@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Creating class Page</div>
  <div class="card-body">

    <form action="{{ url('grades') }}" method="post">
      {!! csrf_field() !!}
      <label>Name</label><br>
      <input type="text" name="name" id="name" class="form-control"><br>

      
      <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"><br>
    </form>

  </div>
</div>
@endsection