<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4>Be Assigned To QP </h4>
</div>

<div style="padding-left: 10px; width: 90%;">
    {{Form::open(array('route'=>'admission.faculty.question-papers.adm-test-qp-assign','method' => 'POST')) }}
    {{Form::hidden('adm_question_id',$q_id )}}
    {{Form::hidden('commented_to', $assign_qp->examiner_faculty_user_id)}}
        <div  style="padding-left: 8%">
           <strong>Question Title : </strong>{{ isset($assign_qp) ? $assign_qp->title : 'no question found!' }}
            <p>
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td>Subject:</td>
                       <td>{{ $assign_qp->relBatchAdmTestSubject->relAdmTestSubject->title }}</td>
                    </tr>
                    <tr>
                        <td>Examiner :</td>
                        <td>{{User::FullName($assign_qp->examiner_faculty_user_id)}}</td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td>{{$assign_qp->status}}</td>
                    </tr>

                </table>
                <small>Comments as below: </small>

                @foreach($assign_qp_assign as $comment)
                    <p style="padding: 1%; background: #efefef;">
                        <b><small>{{ User::FullName($comment->commented_to); }}</small></b>
                        As &nbsp; <b><small>{{  strtoupper(Role::RoleName($comment->commented_by)) }} </small></b><br>
                      &nbsp; &nbsp; &nbsp; {{ $comment->comment }}
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

