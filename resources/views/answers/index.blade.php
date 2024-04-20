<script>
    function deleteAnswer(answer_id) {
        if (confirm("Are you sure?") == true) {
            document.getElementById("delete-answer-" + answer_id).submit();
        }
    }
</script>
<div style="width:50%;">
    <a href="/assessments/ {{$mcq->assessment->id}}" class="btn btn-primary">
   Back</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:45% ;">

            <div class="card">
                <div class="card-header">
                    <h2>Answers </h2>
                    <h4 style="color:grey">
                        {{$mcq->question}}
                    </h4>
                </div>

                <div class="card-body">
                    <a href="{{ route('mcq.answer.create',['mcq_id'=>$mcq->id]) }}" class="btn btn-success btn-sm" title="Add New answer">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <form method="POST" action="{{route('mcq.update.rightanswer',$mcq->id)}}">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>True Answer</th>
                                        <th>Text</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($answers as $answer)
                                    <tr>
                                        <td>
                                            <input type="radio" name="right_answer" @if($answer->right_answer == 1) checked @endif value="{{$answer->id}}" />
                                        </td>
                                        <td>{{ $answer->text }}</td>




                                        <td>
                                           
                                            <a class="btn btn-primary btn-sm" href="{{ route('answers.edit',$answer->id) }}" title="Edit  answer"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" title="Delete answer" onclick="deleteAnswer({{$answer->id}})"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        @foreach($answers as $answer)
                        <form method="POST" id="delete-answer-{{$answer->id}}" action="{{ route('answers.destroy',$answer->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}

                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>