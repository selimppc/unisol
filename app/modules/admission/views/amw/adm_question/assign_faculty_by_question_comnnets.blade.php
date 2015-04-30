<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4>Assign Examiner and Comments </h4>
</div>

<div style="padding: 4%; ">
    {{ Form::open(array('route'=>['admission.amw.admission-test.comments-by-question',$question_data->id],'method' => 'POST')) }}
            {{ Form::hidden('adm_question_id', $q_id ) }}
            {{ Form::hidden('commented_to', $question_data->s_faculty_user_id) }}

            <h5> <strong>Batch # </strong>{{$question_data->relBatchAdmtestSubject->relBatch->batch_number}} </h5>
            <h5>  <strong>Degree Name : </strong>
                {{$question_data->relBatchAdmtestSubject->relBatch->relDegree->relDegreeLevel->code}}
                {{$question_data->relBatchAdmtestSubject->relBatch->relDegree->relDegreeGroup->code}} In
                 {{$question_data->relBatchAdmtestSubject->relBatch->relDegree->relDegreeProgram->code}},
                {{$question_data->relBatchAdmtestSubject->relBatch->relSemester->title}} -
                {{$question_data->relBatchAdmtestSubject->relBatch->relYear->title}}
            </h5>

            <strong>Subject : </strong>{{ $question_data->relBatchAdmtestSubject->relAdmtestSubject->title }}
            <strong>Question Title : </strong>{{ $question_data->title }}

            <div class="form-group">
              {{Form::label('commented_to', 'Examiner (Select Examiner)')}}
              {{ Form::select('commented_to', $examiner_faculty_lists, $question_data->commented_to, ['class' => 'form-control']) }}
            </div> {{Form::hidden('commented_by', Auth::user()->get()->id )}}

            <small>Comments as below: </small>
            @foreach($comments as $comment)
               <p style="padding: 1%; background: #efefef;">
                   <b><small>{{ User::FullName($comment->commented_by); }}</small></b>
                   As &nbsp; <b><small>{{  strtoupper(Role::RoleName($comment->commented_by)) }} </small></b><br>
                 {{--<strong>{{ User::FullName($assign_qp->faculty_user_id) }}</strong>,--}}
                 &nbsp; &nbsp; &nbsp; {{ $comment->comment }}
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

