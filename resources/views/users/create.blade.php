@extends('layouts.app')
@section('content')
<div class="card">
  <div class="card-header">User Page</div>
  <div class="card-body">

    <form action="{{ url('users') }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <label>Full Name</label></br>
      <input required type="text" name="full_name" id="full_name" class="form-control"></br>
      <label>Email</label></br>
      <input required type="email" name="email" id="email" class="form-control"></br>
      <label>Date of birth</label></br>
      <input required placeholder="DD-MM-YY" type="date" name="date_of_birth" id="date_of_birth" class="form-control"></br>

      <livewire:location />

      <label>Phone number</label></br>
      <input required type="text" name="phone_number" id="phone_number" class="form-control"></br>
      <label>School</label></br>
      <input required type="text" name="school" id="school" class="form-control"></br>

      <div class="mb-3">
        <label for="nationality_id" class="form-label">Nationality</label>

        <select required name="nationality_id" id="nationality_id" class="form-select @error('nationality_id') is-invalid @enderror" aria-label="Default select example">
          <option @if(!isset($user) && !old('nationality')) selected @endif disabled value='null'>Choose a nationality</option>
          @foreach($nationalities as $nationality)
          <option @if($nationality->id == old("nationality"))
            selected
            @else
            @isset($user)
            @if($user->nationality_id == $nationality->id)
            selected
            @endif
            @endisset
            @endif
            value="{{$nationality->id}}">

            {{$nationality->name[App::getLocale()]}}
          </option>
          @endforeach
        </select>
        @error('nationality_id')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>

      @if($role_id == 2)

      <input required name="role_id" value="{{$role_id}}" hidden id="role_id" style="width:30% ;height:30px;">

      <div class="mb-3">
        <label for="grade_id" class="form-label">Grade</label>

        <select required name="grade_id" id="grade_id" class="form-select @error('grade_id') is-invalid @enderror" aria-label="Default select example">
          <option @if(!isset($user) && !old('grade')) selected @endif disabled value='null'>Choose a grade</option>
          @foreach($grades as $grade)
          <option @if($grade->id == old("grade_id"))
            selected
            @else
            @isset($user)
            @if($user->grade_id == $grade->id)
            selected
            @endif
            @endisset
            @endif
            value="{{$grade->id}}">

            {{$grade->name}}
          </option>
          @endforeach
        </select>
        @error('grade_id')
        <span class="invalid-feedback" role="alert">
          {{$message}}
        </span>
        @enderror
      </div>


      @elseif ($role_id == 1)
      <input required name="role_id" value="{{$role_id}}" hidden id="role_id" style="width:30% ;height:30px;">
      <div class="container">
        <div class="accordion" id="accordion">
          @foreach($grades as $grade)


          <div class="accordion-item">
            <h2 class="accordion-header" id="{{$grade->id}}">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$grade->id}}" aria-expanded="{{$grade->id == $grades[0]->id}}" aria-controls="collapse-{{$grade->id}}">
                {{$grade->name}}
              </button>
            </h2>
            <div id="collapse-{{$grade->id}}" class="accordion-collapse collapse show" aria-labelledby="{{$grade->id}}" data-bs-parent="#accordion">
              <div class="accordion-body">
                @foreach($grade->courses as $course)
                <br> <input type="checkbox" name="courses[{{$course->id}}]" value="{{$course->id}}" id="course-{{$course->id}}" ><label for="course-{{$course->id}}" style="padding:0px 0px 0px 5px ;margin:auto">{{$course->grade->name . " - " . $course->name}}</label>
                <br>
                @endforeach
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      @endif




      <label>Password</label></br>
      <input required type="password" name="password" id="password" class="form-control"></br>

      <label>Profile Pic</label></br>
      <input type="file" name="profile_pic" id="profile_pic" class="form-control"></br>

      <input type="submit" value="Save" class="btn btn-success" style="background-color: #224C69 ;"></br>
    </form>

  </div>
</div>
@endsection