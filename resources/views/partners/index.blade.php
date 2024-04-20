@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:75% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Partners </h2>
                </div>
                <div class="card-body">
                  
                    <div class="card-body">
                    <a href="{{ route('partners.create') }}" class="btn btn-success btn-sm" title="Add New Partner">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New Partner
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
                                @foreach($partners as $partner)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $partner->name }}</td>
                                    <td>{{ $partner->description}}</td>
                                    <td>{{ $partner->image}}</td>
                                    <td>{{ $partner->link}}</td>
                                    


                                    <td>
                                        <a href="{{ route('partners.show',$partner->id) }}" title="View Partner"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a  class="btn btn-primary btn-sm" href="{{ route('partners.edit',$partner->id) }}" title="Edit  partner"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('partners.destroy',$partner->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  Partner" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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