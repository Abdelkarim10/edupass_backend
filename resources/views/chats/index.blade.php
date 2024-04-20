<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:60% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Chats</h2>
                    <p style="color:grey ;font-weight:400; margin:0"> {{ $user->full_name }} </p>
                </div>
                <br />
                <br />
                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>


                                <th>id</th>
                                <th>Title</th>
                                <th>Assistant ID</th>
                                <th>User ID</th>
                                <th>Question Answered</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chats as $chat)
                            <tr>
                                <td>{{ $chat->id }}</td>
                                <td>{{ $chat->title }}</td>
                                <td>
                                    <a href="{{route('users.show', $chat->assistant_id)}}">
                                        {{ $chat->assistant()->full_name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('users.show', $chat->user_id)}}">
                                        {{ $chat->user()->full_name }}
                                    </a>
                                </td>
                                <td>
                                    if({{$chat->question_answered==1}})
                                    {
                                       YES
                                    }else
                                    {
                                        NO
                                    }
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
