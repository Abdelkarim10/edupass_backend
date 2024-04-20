@extends('layouts.app')
@section('content')



<div style="width:50%;">
    <a href="/grades/{{$course->grade->id}}" class="btn btn-primary" style="background-color: #224C69 ;">
        Back</a>
</div>


<div class="container">

    <div class="row">

        <div class="col-md-9" style="width:55% ;">
            <h1>
                {{$course->name}} Course <img src="{{ env('url') . '/public/assets/course_pics/' .   $course->course_pic }}" width='50' height='50' class="img img-responsive" />
            </h1>
            <div class="card">
                <div class="card-header">
                    <h2>Lessons</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('lesson.courses.create',['course_id'=>$course->id]) }}" class="btn btn-success btn-sm" title="Add New lesson">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>


                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Assessment name</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lesson->name }}</td>
                                    <!-- <td>{{ $lesson->course->name}}</td> -->
                                    <td>
                                        @if($lesson->assessment_id != null)
                                        <a href="{{route('assessments.show', $lesson->assessment->id)}}">
                                            {{ $lesson->assessment->name }}
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('lessons.show',$lesson->id) }}" title="View lesson"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('lessons.edit',$lesson->id) }}" title="Edit  lesson"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('lessons.destroy',$lesson->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  lesson" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <label style="padding: 0;">Notification:</label>
                <input type="text" style="width:25% ;height:25px;margin-right:5px;">
                <button type="submit" class="btn btn-primary" style="width:6% ;height:30px;padding:0;">Notify</button>
            </div>
        </div>

        <div class="col">

            @if($course->assessment_id == null)
            <a href="{{ route('assessment.course.create',['course_id'=>$course->id]) }}" class="btn btn-success btn-sm" title="Add New Course" style="width:30%; height: 10%;font-weight:400">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New Assessemnt
            </a>
            @else


            <p style="font-weight:600">Assessment of {{$course->name}}</p>
            <a class="btn btn-info btn-sm" href="{{ route('assessments.show',$course->assessment_id) }}" title="View Assessment"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
            <a class="btn btn-primary btn-sm" href="{{ route('assessments.edit',$course->assessment_id) }}" title="Edit  Assessment"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
            <form method="POST" action="{{ route('assessments.destroy',$course->assessment_id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete  Assessment" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>


                @endif

                @endsection
        </div>