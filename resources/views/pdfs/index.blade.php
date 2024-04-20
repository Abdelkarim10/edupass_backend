<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:45% ;">
            <div class="card">
                <div class="card-header">
                    <h2>PDF </h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('lesson.pdf.create',['lesson_id'=>$lesson_id]) }}" class="btn btn-success btn-sm" title="Add New pdf">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>File name</th>

                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pdfs as $pdf)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pdf->file_name }}</td>



                                    <td>
                                        <a class="btn btn-info btn-sm" href={{route('pdfs.show',['pdf' => $pdf->id])}} target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('pdfs.edit',$pdf->id,['lesson_id'=>$lesson_id]) }}" title="Edit  pdf"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('pdfs.destroy',$pdf->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  pdf" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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