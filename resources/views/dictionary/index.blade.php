<div class="container">
    <div class="row">
        <div class="col-md-9" style="width:65% ;">
            <div class="card">
                <div class="card-header">
                    <h2>Dictionary </h2>
                </div>
                <div class="card-body">
                    <a href="{{ route('lesson.dict.create',['lesson_id'=> $lesson->id]) }}" class="btn btn-success btn-sm" title="Add New dictionary">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Word</th>
                                    <th>Meaning</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dictionaries as $dictionary)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dictionary->word }}</td>
                                    <td>{{ $dictionary->meaning}}</td>


                                    <td>
                                        <!-- <a href="{{ route('dictionary.show',$dictionary->id) }}" title="View dictionary"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> -->
                                        <a  class="btn btn-primary btn-sm" href="{{ route('dictionary.edit',$dictionary->id) }}" title="Edit  dictionary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <form method="POST" action="{{ route('dictionary.destroy',$dictionary->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete  dictionary" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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