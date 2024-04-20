<div style="width:50%;">
    <a href="/users" class="btn btn-primary">
Back</a>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:50% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Assessments Taken </h2>
                    <p style="color:grey ;font-weight:400; margin:0"> {{ $user->full_name }} </p>
                </div>
                <br />
                <br />
                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>


                                <th>Assessment Taken</th>

                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assessments_taken as $assessment_taken)
                            <tr>
                                <td>{{ $assessment_taken->assessment->name }}</td>



                                <td>
                                    <a href="{{ route('assessment_taken.show',$assessment_taken->id) }}" title="View assessment_taken"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>

                                    <form method="POST" action="{{ route('assessment_taken.destroy',$assessment_taken->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete  Assessment taken" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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