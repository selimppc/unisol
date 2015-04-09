<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h1> View Admission Test "{{User::FullName($test1->user_id)}}"</h1>
</div>

<div style="padding-left: 10px; width: 90%;">
    {{Form::open(array('route'=>'admission.faculty.admission-test.view-admtest-comment','method' => 'POST')) }}
        {{Form::hidden('batch_id', $test1->batch_id)}}
        {{Form::hidden('commented_to', $test1->user_id)}}
        <div  style="padding-left: 8%">
           <h2><strong> Department :</strong>{{ isset($test1) ? ($test1->relBatch->relDegree->relDepartment->title) : 'No Department Available!' }}</h2>

            <p>
                <table class="table table-striped  table-bordered">

                    <tr>
                        <td>Degree :</td>
                        <td>{{ $test1->relBatch->relDegree->title }}</td>
                    </tr>
                    <tr>
                        <td>Name Of Faculty :</td>
                        <td>{{ $test1->relUser->relUserProfile->first_name.' '.$test1->relUser->relUserProfile->middle_name.' '.$test1->relUser->relUserProfile->last_name }}</td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td>{{ $test1->status }}</td>
                    </tr>

                </table>
                <small>Comments as below: </small>

                @foreach($test2 as $do_comments)
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
</div>