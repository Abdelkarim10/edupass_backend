@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:60% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Assessments Page</h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('assessments.create') }}" class="btn btn-success btn-sm" title="Add New Assessment">
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
                                @foreach($assessments as $assessment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assessment->name }}</td>

                                    <td>
                                        <a href="{{ route('assessments.show',$assessment->id) }}" title="View Assessment"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ route('assessments.edit',$assessment->id) }}" title="Edit  Assessment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        <form method="POST" action="{{ route('assessments.destroy',$assessment->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  Assessment" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
</div>
@endsection