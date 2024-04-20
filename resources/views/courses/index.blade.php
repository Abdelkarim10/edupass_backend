@extends('layouts.app')
@section('content')

<div style="width:50%;">
    <a href="/grades" class="btn btn-primary" style="background-color: #224C69 ;">
   Back</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>{{$grade->name}}'s Courses Page </h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('grade.courses.create',['grade_id' => $grade->id]) }}" class="btn btn-success btn-sm" title="Add New Course">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Assessment Name</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)

                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td> {{$course->name }}</td>


                                    <td>
                                        @if($course->assessment_id != null)
                                        {{ $course->assessment->name }}
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('courses.show',$course->id) }}" title="View Course"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('courses.edit',$course->id) }}" title="Edit  Course"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('courses.destroy',$course->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  Course" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
        
        <div>
        <label style="padding: 0;">Notification:</label>
        <input type="text" style="width:25% ;height:25px;margin-right:5px;"> 
        <button type="submit" class="btn btn-primary" style="width:5% ;height:30px;padding:0;">Notify</button>
    </div>
    </div>
   
</div>
@endsection