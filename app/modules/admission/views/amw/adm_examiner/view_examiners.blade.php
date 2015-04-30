<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4>View Examiner "{{User::FullName($data->user_id)}}"</h4>
</div>

<div style="padding-left: 10px; width: 90%;">
    {{ Form::open(array('route'=>'admission.amw.admission-test-examiner.adm-test-examiners-comments','method' => 'POST')) }}
    {{Form::hidden('batch_id', $data->batch_id)}}
    {{Form::hidden('commented_to', $data->user_id)}}
        <div  style="padding-left: 8%">
            <strong> Department: </strong> {{ $data->relBatch->relDegree->relDepartment->title }}
            <p>
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td>Degree:</td>
                        <td>{{ $data->relBatch->relDegree->relDegreeLevel->code.'  '.$data->relBatch->relDegree->relDegreeGroup->code.' In '.$data->relBatch->relDegree->relDegreeProgram->code}}</td>
                    </tr>
                    <tr>
                        <td>Name of Faculty :</td>
                        <td>{{User::FullName($data->user_id)}}</td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td>{{$data->status}}</td>
                    </tr>

                </table>
                <small>Comments as below: </small>

                @foreach($exm_comment_info as $comment)
                    <p style="padding: 1%; background: #efefef;">
                       <b><small>{{ User::FullName($comment->commented_by) }}</small></b>
                       &nbsp; As &nbsp; <b><small>{{  strtoupper(Role::RoleName($comment->commented_by)) }} </small></b><br>
                     {{--<strong>{{ User::FullName($assign_qp->faculty_user_id) }}</strong>,--}}
                     {{ User::FullName($comment->commented_to) }},
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