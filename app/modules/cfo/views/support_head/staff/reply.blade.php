
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3 style="text-align: center;"></h3>
</div>

<div style="padding-left: 10px; width: 90%;">

    {{ Form::open(array('route'=>'support-head.reply-to-user','method' => 'POST')) }}
    {{--{{Form::hidden('id', $data->id)}}--}}
    {{--{{Form::hidden('exm_exam_list_id', $data->exm_exam_list_id)}}--}}
    {{--{{Form::hidden('commented_to', $data->user_id)}}--}}
        <div  style="padding-left: 8%">
            <p>&nbsp;</p>
            <p>
                <table class="table table-striped  table-bordered">
                     <tr>
                        <td>Subject:</td>
                        <td>{{ isset($model->relCfoSupportHead->subject)?$model->relCfoSupportHead->subject:''}}</td>
                     </tr>
                    <tr>
                        <td>User Message:</td>
                        <td>{{ isset($model->message)?$model->message:''}}</td>
                    </tr>
                    {{--<tr>--}}
                        {{--<td>Name of Faculty :</td>--}}
                        {{--<td>{{User::FullName($data->user_id)}}</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>{{ Form::label('type', 'Examiner Type') }}</td>--}}
                        {{--<td>{{ Form::select('type',--}}
                    {{--array('question-setter' => 'Question Setter','question-evaluator' => 'Question Evaluator','both' => 'Both'),--}}
                    {{--$data->type,['class'=>'form-control','required'=>'required']) }}</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        <td>Status :</td>
                        <td>
                            {{isset($model->status)?ucfirst($model->status):''}}
                        </td>
                    </tr>
                </table>
                <small>Comments as below: </small>

                {{--@foreach($model as $v)--}}
                     {{--<p style="padding: 1%; background: #efefef;">--}}
                          {{--Comments To User  <b>{{ User::FullName([Auth::user()->get()->id]) }}</b>--}}
                          {{--From <b>{{ User::FullName($values->commented_by) }}</b>&nbsp; As &nbsp;--}}
                          {{--<b><small>{{  strtoupper(Role::RoleName($comment->commented_by)) }} : </small></b><br>--}}
                         {{--{{ isset($v->message)?$v->message:'' }}--}}
                    {{--</p>--}}
                {{--@endforeach--}}

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