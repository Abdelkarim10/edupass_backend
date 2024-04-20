@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:75% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Sponsors </h2>
                </div>
                <div class="card-body">
                  
                    <div class="card-body">
                    <a href="{{ route('sponsors.create') }}" class="btn btn-success btn-sm" title="Add New Partner">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New Sponsor
                    </a>
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>image</th>
                                    <th>link</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sponsors as $sponsor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sponsor->name }}</td>
                                    <td>{{ $sponsor->description}}</td>
                                    <td>{{ $sponsor->image}}</td>
                                    <td>{{ $sponsor->link}}</td>
                                    


                                    <td>
                                        <a href="{{ route('sponsors.show',$sponsor->id) }}" title="View sponsor"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a  class="btn btn-primary btn-sm" href="{{ route('sponsors.edit',$sponsor->id) }}" title="Edit  sponsor"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('sponsors.destroy',$sponsor->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  sponsor" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
    @endsection