<div style="width:50%;">
    @if($assessment->lesson != null)
    <a href="/lessons/{{$assessment->lesson->id }}" class="btn btn-primary">Back</a>
    @else
    <a href="/courses/{{$assessment->course->id }}" class="btn btn-primary">Back</a>
    @endif
</div>
<div class="container">

    <div class="row">
        <div class="col-md-9" style="width:45% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Mcqs </h2>
                    
                </div>
                <div class="card-body">
                    <a href="{{ route('assessment.mcq.create',['assessment_id'=>$assessment->id]) }}" class="btn btn-success btn-sm" title="Add New User">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Questions</th>
                                    <th>Picture</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                           
                                @foreach($mcqs as $mcq)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mcq->question }}</td>
                                    <td> <img src="{{ env('url') . '/public/assets/mcq_pics/' .   $mcq->mcq_pic }}" width='50' height='50' class="img img-responsive" /></td>



                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{route('mcqs.show',$mcq->id)}} " title="show  pdf"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('mcqs.edit',$mcq->id) }}" title="Edit  pdf"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('mcqs.destroy',$mcq->id) }}" accept-charset="UTF-8" style="display:inline">
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