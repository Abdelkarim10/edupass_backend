@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:75% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Contact Us page </h2>
                </div>
                <div class="card-body">

                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>title</th>
                                    <th>User</th>
                                    <th>Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contactsUs as $contactUs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contactUs->title }}</td>
                                    <td> <a href="/users/{{  $contactUs->user->id }}">{{ $contactUs->user->full_name}} </a></td>




                                    <td>
                                        <a href="{{ route('contact-us.show',$contactUs->id) }}" title="View contactUs"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('contact-us.edit',$contactUs->id) }}" title="Edit  contactUs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('contact-us.destroy',$contactUs->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  contactUs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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