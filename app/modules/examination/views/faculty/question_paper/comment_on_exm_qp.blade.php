<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4>Assign and Comment </h4>
</div>

<div style="padding-left: 10px; width: 90%;">
    {{Form::open(array('route'=>'faculty.exm-question-paper.save-comment','method' => 'POST')) }}
    {{Form::hidden('exm_question_id',$e_q_id )}}
    {{Form::hidden('commented_to', $assign_exm_qp->s_faculty_user_id)}}
        <div  style="padding-left: 8%">
           <strong>Question Title : </strong>{{ isset($assign_exm_qp) ? $assign_exm_qp->title : 'no question found!' }}
            <p>
                <table class="table table-striped  table-bordered">

                    {{--<tr>--}}
                        {{--<td>Examiner :</td>--}}
                        {{--<td>{{User::FullName($assign_exm_qp->s_faculty_user_id)}}</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>Status :</td>--}}
                        {{--<td>{{$assign_exm_qp->s_status}}</td>--}}
                    {{--</tr>--}}

                    @if( $assign_exm_qp->s_faculty_user_id == $assign_exm_qp->e_faculty_user_id )
                           <tr>
                               <td>Examiner :</td>
                               <td>{{User::FullName($assign_exm_qp->s_faculty_user_id)}}</td>
                           </tr>
                           <tr>
                               <td>Status :</td>
                               <td>
                                   {{ ucfirst($assign_exm_qp->s_status) }} as {{ "Setter" }} </br>
                                   {{ ucfirst($assign_exm_qp->e_status) }} as {{ "Evaluator" }}
                               </td>
                           </tr>
                    @elseif( $assign_exm_qp->s_faculty_user_id == Auth::user()->get()->id )
                           <tr>
                               <td>Examiner :</td>
                               <td>{{User::FullName($assign_exm_qp->s_faculty_user_id)}}</td>
                           </tr>
                           <tr>
                               <td>Status :</td>
                               <td>{{ ucfirst($assign_exm_qp->s_status) }}</td>
                           </tr>
                    @elseif( $assign_exm_qp->e_faculty_user_id == Auth::user()->get()->id )
                           <tr>
                               <td>Examiner :</td>
                               <td>{{User::FullName($assign_exm_qp->e_faculty_user_id)}}</td>
                           </tr>
                           <tr>
                               <td>Status :</td>
                               <td>{{ ucfirst($assign_exm_qp->e_status) }}</td>
                           </tr>
                    @endif

                </table>
                <small>Comment: </small>

                @foreach($assign_exm_qp_comment as $comment)
                    <p style="padding: 1%; background: #efefef;">
                        <b><small>{{ User::FullName($comment->commented_by); }}</small></b>
                        As &nbsp; <b><small>{{  strtoupper(Role::RoleName($comment->commented_by)) }} </small></b><br>

                      @if( $assign_exm_qp->s_faculty_user_id == Auth::user()->get()->id )
                              <strong>{{ User::FullName($assign_exm_qp->s_faculty_user_id) }}</strong>,
                      @elseif( $assign_exm_qp->e_faculty_user_id == Auth::user()->get()->id )
                              <strong>{{ User::FullName($assign_exm_qp->e_faculty_user_id) }}</strong>,
                      @endif
                      &nbsp; &nbsp; &nbsp; {{ $comment->comment }}

                    </p>
                @endforeach

                <div class="form-group">
                      {{ Form::textarea('comment', Null, ['onkeyup'=>"javascript:this.value=this.value.replace(/[<>]/g,'');",'class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
                </div>
            </p>
        </div>
    {{ Form::submit('Submit Comment', array('class'=>'pull-right btn-sm btn-info')) }}
    <a href="" class="pull-right btn-sm bg-navy" style="margin-right: 5px">Close</a>
    &nbsp;
    </br>
    &nbsp;
    {{ Form::close() }}
</div>