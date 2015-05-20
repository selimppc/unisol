<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3 style="text-align: center;">Information Of Examiner: "{{User::FullName($data->user_id)}}"</h3>
</div>

<div style="padding-left: 10px; width: 90%;">

    {{ Form::open(array('route'=>'amw.comments-examiners','method' => 'POST')) }}
    {{Form::hidden('id', $data->id)}}
    {{Form::hidden('exm_exam_list_id', $data->exm_exam_list_id)}}
    {{Form::hidden('commented_to', $data->user_id)}}
        <div  style="padding-left: 8%">
            <p>&nbsp;</p>
            <p>
                <table class="table table-striped  table-bordered">
                     <tr>
                        <td>Department:</td>
                        <td>{{ $data->relExmExamList->relCourseConduct->relCourse->relSubject->relDepartment->title}}</td>
                     </tr>
                    <tr>
                        <td>Subject:</td>
                        <td>{{ $data->relExmExamList->relCourseConduct->relCourse->relSubject->title}}</td>
                    </tr>
                    <tr>
                        <td>Name of Faculty :</td>
                        <td>{{User::FullName($data->user_id)}}</td>
                    </tr>
                    <tr>
                        <td>{{ Form::label('type', 'Examiner Type') }}</td>
                        <td>{{ Form::select('type',
                    array('question-setter' => 'Question Setter','question-evaluator' => 'Question Evaluator','both' => 'Both'),
                    $data->type,['class'=>'form-control','required'=>'required']) }}</td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td>
                            @if($data->status == 'cancel')
                              Revoked
                            @else
                              {{ucfirst($data->status)}}
                            @endif
                        </td>
                    </tr>
                </table>
                <small>Comments as below: </small>

                @foreach($exmr_comments as $comment)
                    <p style="padding: 1%; background: #efefef;">
                      Comments To Examiner  <b>{{ User::FullName($comment->commented_to) }}</b>
                      From <b>{{ User::FullName($comment->commented_by) }}</b>&nbsp; As &nbsp;
                      <b><small>{{  strtoupper(Role::RoleName($comment->commented_by)) }} : </small></b><br>
                     {{ $comment->comment }}
                   </p>
                @endforeach

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