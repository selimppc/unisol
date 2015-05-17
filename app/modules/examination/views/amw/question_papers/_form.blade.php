
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Question Paper</h4>
</div>

{{ HTML::script('assets/js/custom.js')}}

<div class="modal-body">
     <div style="padding: 20px;">
       {{Form::open(array('route'=>'amw.question-papers.store', 'method'=>'POST','files'=>true))}}
       {{Form::hidden('exm_exam_list_id', $exm_exam_list_id)}}
       {{Form::hidden('course_conduct_id', $course_conduct_id)}}

               {{--<div class='form-group'>--}}
                     {{--<strong> Batch# </strong> {{ $batch->batch_number }} </br>--}}
                     {{--<strong> Degree Name: </strong> {{ $batch->relVDegree->title }},--}}
                        {{--{{ $batch->relSemester->title }} - {{ $batch->relYear->title }}--}}
               {{--</div>--}}

                <div class='form-group'>
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', Input::old('title'),['class'=>'form-control','required'=>'required']) }}
                </div>

                <div class='form-group'>
                    {{ Form::label('deadline', 'Deadline') }}
                    {{ Form::text('deadline', Input::old('deadline'),['class'=>'form-control date_picker','required'=>'required']) }}
                </div>

                <div class='form-group'>
                    {{ Form::label('total_marks', 'Total Marks') }}
                    {{ Form::text('total_marks', Input::old('total_marks'),['class'=>'form-control','required'=>'required']) }}
                </div>
                <div class='form-group'>
                    {{ Form::label('s_faculty_user_id', 'Setter') }}
                    {{ Form::select('s_faculty_user_id', $examiner_faculty_lists, Input::old('s_faculty_user_id'),['class'=>'form-control']) }}
                </div>
                 <div class='form-group'>
                     {{ Form::label('e_faculty_user_id', 'Evaluator') }}
                     {{ Form::select('e_faculty_user_id', $examiner_faculty_lists, Input::old('e_faculty_user_id'),['class'=>'form-control']) }}
                 </div>
                {{ Form::hidden('status', 'open') }}


              {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
              <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

              <p>&nbsp;</p>
        {{Form::close()}}
     </div>
</div>


