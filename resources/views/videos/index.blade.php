<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:45% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Videos </h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('lesson.video.create',['lesson_id'=> $lesson->id]) }}" class="btn btn-success btn-sm" title="Add New video">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Link</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videos as $video)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td><a href="{{ $video->link }}">{{ $video->link }}</a></td>



                                    <td>
                                        <form method="POST" action="{{ route('videos.destroy',$video->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  video" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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