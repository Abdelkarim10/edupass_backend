@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:60% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Grades Page</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('grades.create') }}" class="btn btn-success btn-sm" title="Add New Grade">
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

                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($grades as $grade)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $grade->name }}</td>

                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('grades.show',$grade->id) }}" title="View Grade"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('grades.edit',$grade->id) }}" title="Edit  Grade"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('grades.destroy',$grade->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  Grade" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
    </div>
    <br>
    <div class="row">
        <label style="padding: 0;">Notification:</label>
        <input type="text" style="width:25% ;height:25px;margin-right:5px;"> 
        <button type="submit" class="btn btn-primary" style="width:5% ;height:30px;padding:0;">Notify</button>
    </div>
</div>
@endsection