@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:100% ;">
            <div class="card">
                <div class="card-header">
                    <h2>
                        @if(!$assistant)Users @else Assistants @endif Page</h2>
                </div>
                <div class="card-body">
                    @if(!$assistant)
                    <a href="/users-student-create" class="btn btn-success btn-sm" title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New User
                    </a>
                    @else
                    <a href="/users-assistant-create" class="btn btn-success btn-sm" title="Add New Assistant">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New Assistant
                    </a>
                    @endif
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>id</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Date of birth</th>
                                    <th>Country</th>
                                    <th>Governorate</th>
                                    <th>District</th>
                                    <th>City</th>
                                    <th>Phone Number</th>
                                    <th>School</th>
                                    <th>Nationality</th>
                                    <th>Grade name</th>
                            {{--    <th>Role rank</th>--}}
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="align-middle">
                                        @if($user->profile_pic)
                                            <img
                                                src="{{ env('url') . '/public/assets/profile_pics/' .   $user->profile_pic }}"
                                                class="img-fluid rounded rounded-circle"
                                                style="height: 100px; width: 100px;object-fit: cover"
                                                alt=""

                                            />
                                        @endif
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->date_of_birth}}</td>
                                    <td>{{ $user->country->name[App::getLocale()] }}</td>
                                    <td>{{ $user->governorate->name[App::getLocale()] }}</td>
                                    <td>{{ $user->district->name[App::getLocale()] }}</td>
                                    <td>{{ $user->city->name[App::getLocale()] }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->school }}</td>
                                    <td>{{ $user->nationality->name[App::getLocale()] }}</td>
                                    <td> @if($user->grade != null){{ $user->grade->name }}@endif</td>

{{--                                    <td>{{ $user->role->rank }}</td>--}}

                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}" title="View User"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}" title="Edit  User"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('users.destroy',$user->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  User" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
    <div class="row" style="width:95% ;margin:auto">
        <label style="padding: 0;">Notification:</label>
        <input type="text" style="width:25% ;height:25px;margin-right:5px;">
        <button type="submit" class="btn btn-primary" style="width:5% ;height:30px;padding:0;">Notify</button>
    </div>
</div>
@endsection
