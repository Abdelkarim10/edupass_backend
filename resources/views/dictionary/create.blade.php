@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">Dictionaries Page</div>
  <div class="card-body">

    <form action="{{ url('dictionary') }}" method="post">
      {!! csrf_field() !!}
      <label>Word</label></br>
      <input type="text" name="word" id="word" class="form-control"></br>
      <label>Meaning</label></br>
      <input type="text" name="meaning" id="meaning" class="form-control"></br>

      <input required name="lesson_id" value="{{$lesson_id}}" hidden id="lesson_id" style="width:30% ;height:30px;">

      <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"></br>

    </form>

  </div>

</div>
@endsection