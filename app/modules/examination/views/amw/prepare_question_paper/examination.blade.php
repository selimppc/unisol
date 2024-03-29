@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
       <h1>Welcome to Examination : <strong></strong> </h1> <br>

       <div class="row">
           <div class="col-sm-12">
               {{ Form::open(array('url' => 'examination/amw/search')) }}
                   <div class="col-sm-8">
                        <div class="col-sm-3">
                                 {{ Form::label('year_id', 'Year') }}
                                 {{ Form::select('year_id',$year_id, Input::old('year_id'), array('class' => 'form-control','required'=>'required') ) }}

                        </div>
                        <div class="col-sm-3">
                                 {{ Form::label('semester_id', 'Semester') }}
                                 {{ Form::select('semester_id',$semester_id, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}

                        </div>
                        <div class="col-sm-2">
                            </br>
                            {{ Form::submit('Filter', array('class'=>'btn btn-success btn-xs'))}}
                        </div>
                   </div>
               {{ Form::close() }}

               <div class="col-sm-4">
                       <div class="btn-group" style="margin-right: 10px">
                           <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                     data-target="#AddExamination">
                                       Add Examination
                           </button>
                       </div>
               </div>
           </div>
       </div>


           {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
               <table id="example" class="table table-striped  table-bordered"  >
                      <thead>
                             {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                             <br>
                             <tr>
                                <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                <th>Title</th>
                                <th>Dept</th>
                                <th>Course</th>
                                <th>Type</th>
                                <th>Year</th>
                                <th>Term</th>
                                <th>Action</th>
                             </tr>
                      </thead>
                      <tbody>
                          @foreach($exam_data as $exam_list)
                                <tr>
                                    <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $exam_list['id'] }}"></td>
                                    {{--<td> {{ HTML::linkAction('ExmAmwController@courses', $exam_list->title) }} </td>--}}
                                    <td>{{ HTML::linkAction('ExmAmwController@courses', $exam_list->title, ['acm_marks_dist_item_id'=>$exam_list->acm_marks_dist_item_id , 'year_id'=>$exam_list->year_id, 'semester_id'=>$exam_list->semester_id, 'course_management_id'=>$exam_list->course_management_id ])  }} </td>

                                    <td>{{ $exam_list->relCourseManagement->relCourse->relSubject->relDepartment->title }}</td>
                                    <td>{{ $exam_list->relCourseManagement->relCourse->title }}</td>
                                    <td>{{ $exam_list->relAcmMarksDistItem['title'] }}</td>
                                    <td>{{ Year::getYearsName($exam_list->year_id) }}</td>
                                    <td>{{ Semester::getSemesterName($exam_list->semester_id) }}</td>

                                    <td>
                                       <a href="{{ URL::route('examination.amw.viewExamination', ['id'=>$exam_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>
                                       <a href="{{ URL::route('examination.amw.editExamination', ['id'=>$exam_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>
                                    </td>
                                </tr>
                          @endforeach
                      </tbody>
               </table>
           {{form::close() }}

{{--           {{ $exam_data->links() }}--}}


        <p>&nbsp;</p><p>&nbsp;</p>
@include('examination::amw.prepare_question_paper._modal._add_examination')
@include('examination::amw.prepare_question_paper._modal._common_modal')

@stop
