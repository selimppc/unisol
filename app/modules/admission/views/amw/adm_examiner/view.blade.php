<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4>View Examiner: {{$data->relUser->relUserProfile->first_name.' '.$data->relUser->relUserProfile->middle_name.' '.$data->relUser->relUserProfile->last_name}}</h4>
</div>

<div style="padding-left: 10px; width: 90%;">
    {{ Form::open(array('route'=>'admission.amw.admexaminer-comments','method' => 'POST')) }}
    {{Form::hidden('id', $data->id)}}
    {{Form::hidden('batch_id', $data->batch_id)}}
    {{Form::hidden('commented_to', $data->user_id)}}
        <div  style="padding-left: 8%">
            <strong> Department: </strong> {{ $data->relBatch->relVDegree->dept_title }}
            <p>
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td>Degree:</td>
                        <td>{{ $data->relBatch->relVDegree->title}}</td>
                    </tr>
                    <tr>
                        <td>Name of Faculty :</td>
                        <td>{{$data->relUser->relUserProfile->first_name.' '.$data->relUser->relUserProfile->middle_name.' '.$data->relUser->relUserProfile->last_name}}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('type', 'Examiner Type') }}</td>
                        <td>{{ Form::select('type',
                    array('question-setter' => 'Question Setter','question-evaluator' => 'Question Evaluator','both' => 'Both'),
                    $data->type,['class'=>'form-control','required'=>'required']) }}</td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td>{{ucwords($data->status)}}</td>
                    </tr>

                </table>
                <small>Comments as below: </small>

                @if($data->relBatch->relAdmExaminerComments)

                    @foreach($data->relBatch->relAdmExaminerComments as $comment)
                        <p style="padding: 1%; background: #efefef; margin-bottom: 10px;">
                           <b><small>
                                   {{$comment->relCommentedByUser->relUserProfile->first_name.' '.$comment->relCommentedByUser->relUserProfile->middle_name.' '.$comment->relCommentedByUser->relUserProfile->last_name}}</small></b>
                           &nbsp; As &nbsp; <b><small>{{$comment->relCommentedToUser->relRole->title}}</small></b><br />
                            <b><small>TO: </small></b> {{$comment->relCommentedToUser->relUserProfile->first_name.' '.$comment->relCommentedToUser->relUserProfile->middle_name.' '.$comment->relCommentedToUser->relUserProfile->last_name}}
                            <br /><b><small>Comments: </small></b>{{ $comment->comment }}
                       </p>
                    @endforeach
                @endif

                <div class="form-group">
                      {{ Form::textarea('comment', Null, ['class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
                </div>
            </p>
        </div>
    {{ Form::submit('Submit Comment', array('class'=>'pull-right btn-sm btn-info')) }}
    <a href="" class="pull-right btn-sm btn-default" style="margin-right: 5px">Close</a>
    &nbsp;
    </br>
    &nbsp;
    {{ Form::close() }}
</div>