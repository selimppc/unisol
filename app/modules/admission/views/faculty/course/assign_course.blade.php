<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4>Assign Course </h4>
</div>

<div style="padding-left: 10px; width: 90%;">
    {{Form::open(array('route'=>'admission.faculty.course.course-assign','method' => 'POST')) }}
    {{Form::hidden('course_conduct_id',$id )}}
    {{Form::hidden('commented_to', $assign_course->faculty_user_id)}}
        <div  style="padding-left: 8%">
           <strong>Course : </strong>{{ isset($assign_course) ? $assign_course->relCourse->title : 'No Course Available!' }}
            <p>
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td>Year:</td>
                       <td>{{ $assign_course->relYear->title }}</td>
                    </tr>
                    <tr>
                        <td>Semester :</td>
                        <td>{{ $assign_course->relSemester->title }}</td>
                    </tr>
                    <tr>
                        <td>Degree :</td>
                        <td>{{ $assign_course->relDegree->title}}</td>
                    </tr>
                    <tr>
                        <td>Department :</td>
                        <td>{{ $assign_course->relDegree->relDepartment->title }}</td>
                    </tr>
                    <tr>
                        <td>Status :</td>
                        <td>{{ $assign_course->status }}</td>
                    </tr>

                </table>
                <small>Comments as below: </small>

                @foreach($assign_course_commnt as $do_comments)
                    <p style="padding: 1%; background: #efefef;">
                        <b><small>{{ User::FullName($do_comments->commented_to); }}</small></b>
                        As &nbsp; <b><small>{{  strtoupper(Role::RoleName($do_comments->commented_by)) }} </small></b><br>
                      &nbsp; &nbsp; &nbsp; {{ $do_comments->comments }}
                    </p>
                @endforeach

                <div class="form-group">
                      {{ Form::textarea('comments', Null, ['class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
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

