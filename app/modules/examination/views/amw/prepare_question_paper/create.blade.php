{{--<div style="padding: 10px; width: 90%;">--}}
        {{--<h2>Create Prepare Question Paper : <strong>{{ ucwords(Auth::user()->username) }}</strong></h2>--}}
            {{--{{ Form::open(array('url' => 'examination/amw/store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}--}}
                        {{--@include('examination::amw/prepare_question_paper/_form')--}}


                                    {{--<?php--}}
                                        {{--$exm_exam_list_id = ExmExamList::lists('title', 'id');--}}

                                    {{--?>--}}

                                    {{--$course_management_id = CourseManagement::lists('title', 'id');--}}

                                    {{--<div class="form-group">--}}
                                           {{--{{ Form::label('exm_exam_list_id', 'Exam Name') }}--}}
                                           {{--{{ Form::select('exm_exam_list_id', $exm_exam_list_id, Input::old('exm_exam_list_id') )}}--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                           {{--{{ Form::label('title', 'Title') }}--}}
                                           {{--{{ Form::text('title', Input::old('title'), array('class' => 'form-control','required'=>'required')) }}--}}
                                    {{--</div>--}}
                                   {{--<div class="form-group">--}}
                                        {{--{{ Form::label('deadline', 'Deadline') }}--}}
                                        {{--{{ Form::text('deadline', Input::old('deadline'), array('class' => 'form-control datepicker','required'=>'required')) }}--}}
                                   {{--</div>--}}
                                   {{--<div class="form-group">--}}
                                         {{--{{ Form::label('total_marks', 'Total Marks') }}--}}
                                         {{--{{ Form::text('total_marks', Input::old('total_marks'), array('class' => 'form-control','required'=>'required')) }}--}}
                                   {{--</div>--}}

                                   {{--<div class="form-group">--}}
                                          {{--{{ Form::label('course_management_id', 'Course Name') }}--}}
                                          {{--{{ Form::select('course_management_id', $courseList, Input::old('course_management_id') )}}--}}
                                   {{--</div>--}}






                                    {{--<div class="form-group">--}}
                                         {{--{{ Form::label('created_by', 'Created by') }}--}}
                                         {{--{{ Form::text('created_by', Input::old('created_by'), array('class' => 'form-control','required'=>'required')) }}--}}
                                    {{--</div>--}}
                                   {{--<div class="form-group">--}}
                                          {{--{{ Form::label('updated_by', 'Updated By') }}--}}
                                          {{--{{ Form::text('updated_by', Input::old('updated_by'), array('class' => 'form-control','required'=>'required')) }}--}}
                                   {{--</div>--}}
                                    {{--<div class="form-group">--}}
                                          {{--{{ Form::label('assign_to', 'Assign To') }}--}}
                                          {{--{{ Form::select('assign_to', Input::old('assign_to'), array('class' => 'form-control','required'=>'required'))}}--}}
                                    {{--</div>--}}
                                    {{--{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}--}}
                                    {{--<a href="{{URL::to('examination/amw/index')}}" class="btn btn-default">Close </a>--}}



            {{--{{ Form::close() }}--}}
{{--</div>--}}


