<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4>Research Paper Comment</h4>
</div>

<div style="padding-left: 10px; width: 90%;">
    {{Form::open(array('route'=>'amw.research-paper.save-comment','method' => 'POST')) }}
    {{Form::hidden('rnc_research_paper_id',$rnc_id )}}
{{--    {{Form::hidden('commented_to', $rnc_r_p->s_faculty_user_id)}}--}}
        <div  style="padding-left: 8%">
            <p>
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td>Research Paper Name:</td>
                       <td>{{ $rnc_r_p->title }}</td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td>{{ ucfirst($rnc_r_p->status) }}</td>
                    </tr>

                </table>
                <small>Comments as below: </small>

                @foreach($rnc_r_p_cmnt as $comment)
                    <p style="padding: 1%; background: #efefef;">
                     To : <b><small>{{ User::FullName($comment->commented_to); }}</small></b></br>

                      &nbsp; &nbsp; &nbsp; {{ $comment->comments }} </br>
                     By : <b><small>{{ User::FullName($comment->commented_by); }}</small></b>
                     As &nbsp;<b><small>{{ strtoupper(Role::RoleName($comment->commented_by)) }} </small></b><br>
                    </p>
                @endforeach

                <div class="form-group">
                      {{ Form::select('commented_to', $commented_to,Input::old('commented_to'), array('class' => 'form-control')) }} </br>
                      {{ Form::textarea('comments', Null, ['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",'class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
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