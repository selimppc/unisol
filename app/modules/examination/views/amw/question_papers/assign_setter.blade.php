
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4>Assign Question Setter </h4>
</div>

<div style="padding:3%; ">
   {{ Form::open(array('route'=>['amw.assign-examiner-comments',$question_data->id],'method' => 'POST')) }}

        {{Form::hidden('exm_question_id', $q_id )}}
        {{Form::hidden('examiner_type', 'setter' )}}
        {{Form::hidden('commented_to', $question_data->s_faculty_user_id)}}
        {{Form::hidden('commented_by', Auth::user()->get()->id )}}

            <b><h5 style="text-align: center;color: darkblue">Subject : {{ $question_data->relCourseConduct->relCourse->relSubject->title }}</h5></b>
            <b><h5 style="text-align: center;color: darkblue">Question Title : {{ $question_data->title }}</h5></b>
            <br>
            <div class="form-group">
                  <div class="col-lg-6" style="padding-left: 0;">
                      <div>{{Form::label('commented_to', 'Setter')}}</div>
                      <div>{{ Form::select('commented_to', $examiner_faculty_lists, $question_data->s_faculty_user_id, ['class' => 'form-control']) }}</div>
                  </div>
                  <div class="col-lg-6">
                      <div>{{Form::label('commented_to', 'Status')}}</div>
                      <div>{{ Form::select('s_status', ['requested'=> 'Requested', 'cancel'=>'Cancel','assigned' => 'Assigned'], $question_data->s_staus,['class' => 'form-control']) }}</div>
                  </div>
            </div>
            <p>&nbsp;</p>

            <small>Comments as below: </small>
            @foreach($comments as $comment)
                <p style="padding: 1%; background: #efefef;">
                    <small>To: </small> {{ isset($comment->relToUser->relUserProfile->first_name) ? $comment->relToUser->relUserProfile->first_name : '' }}
                           {{ isset($comment->relToUser->relUserProfile->middle_name) ? $comment->relToUser->relUserProfile->middle_name : '' }}
                           {{ isset($comment->relToUser->relUserProfile->last_name) ? $comment->relToUser->relUserProfile->last_name : '' }}
                    <small> as {{ $comment->relToUser->relRole->title }}</small>
                    <br>
                        {{ $comment->comment }}
                        <br>
                    <small>By: </small> {{ isset($comment->relByUser->relUserProfile->first_name) ? $comment->relByUser->relUserProfile->first_name : '' }}
                            {{ isset($comment->relByUser->relUserProfile->middle_name) ? $comment->relByUser->relUserProfile->middle_name : '' }}
                            {{ isset($comment->relByUser->relUserProfile->last_name) ? $comment->relByUser->relUserProfile->last_name : '' }}
                    <small> as {{ $comment->relByUser->relRole->title }}</small>
               </p>
            @endforeach


            <div class="form-group">
                  {{ Form::textarea('comment', Null, ['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",'class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
            </div>

            {{ Form::submit('Submit Comment', array('class'=>'pull-right btn-sm btn-info')) }}
            <a href="" class="pull-right btn-sm btn-default" span class="glyphicon-refresh">Close</a>
            &nbsp;
            </br>
            &nbsp;

    {{ Form::close() }}

</div>

