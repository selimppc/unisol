<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h1> View Admission Test "{{User::FullName($view_examiner->user_id)}}"</h1>
</div>

<div style="padding-left: 10px; width: 90%;">
    {{Form::open(array('route'=>'admission.faculty.admission-test.view-admtest-comment','method' => 'POST')) }}
        {{Form::hidden('batch_id', $view_examiner->batch_id)}}
        {{Form::hidden('commented_to', $view_examiner->user_id)}}
        <div  style="padding-left: 8%">
           <h2><strong> Department :</strong>{{ isset($view_examiner) ? ($view_examiner->relBatch->relDegree->relDepartment->title) : 'No Department Available!' }}</h2>

            <p>
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td>Degree :</td>
                        <td>{{ $view_examiner->relBatch->relDegree->relDegreeLevel->code.''. $view_examiner->relBatch->relDegree->relDegreeGroup->code.' In '. $view_examiner->relBatch->relDegree->relDegreeProgram->code}}</td>
                    </tr>
                    <tr>
                        <td>Name Of Faculty :</td>
                        <td>{{ $view_examiner->relUser->relUserProfile->first_name.' '.$view_examiner->relUser->relUserProfile->middle_name.' '.$view_examiner->relUser->relUserProfile->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td>{{ $view_examiner->status }}

                            @if($view_examiner->status == 'Requested' )
                               <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#confirm_deny">Deny</a>
                               <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#confirm_accept">Accept</a>
                            @elseif( $view_examiner->status == 'Accepted' )
                               <a href="{{ URL::route('admission.faculty.question-papers.admtest-question-paper', [ 'year_id'=>$view_examiner->relBatch->year_id ,'semester_id'=>$view_examiner->relBatch->semester_id ,'batch_id'=>$view_examiner->batch_id  ]) }}" class="btn btn-info btn-xs" >Questions</a>
                            @endif

                        </td>

                    </tr>

                </table>

                <small>Comments as below: </small>

                @foreach($view_examiner_comment as $do_comments)
                    <p style="padding: 1%; background: #efefef;">
                        <b><small>{{ User::FullName($do_comments->commented_to); }}</small></b>
                        As &nbsp; <b><small>{{  strtoupper(Role::RoleName($do_comments->commented_by)) }} </small></b><br>
                      &nbsp; &nbsp; &nbsp; {{ $do_comments->comment }}
                    </p>
                @endforeach

                <div class="form-group">
                      {{ Form::textarea('comment', Null, ['class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
                </div>
            </p>
        </div>
    {{ Form::submit('Submit Comment', array('class'=>'pull-right btn-sm btn-info')) }}
    <a href="" class="pull-right btn-sm bg-navy" style="margin-right: 5px">Close</a>
    &nbsp;
    </br>
    &nbsp;
    {{ Form::close() }}



     <div class="modal fade " id="confirm_accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Confirm Accept</h4>
                    </div>
                    <div class="modal-body">
                        <strong>Are you sure to Accept This Request?</strong>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a href="{{ URL::route('admission.faculty.admission-test.change-status-to-accept',['id'=>$view_examiner->id]) }}" class="btn btn-success">Accept</a>


                    </div>
                </div>
            </div>
        </div>


     <div class="modal fade " id="confirm_deny" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Confirm Deny</h4>
                    </div>
                    <div class="modal-body">
                        <strong>Are you sure to Deny This Request?</strong>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a href="{{ URL::route('admission.faculty.admission-test.change-status-to-deny', ['id'=>$view_examiner->id])}}" class="btn btn-warning">Deny</a>

                    </div>
                </div>
            </div>
        </div>


</div>