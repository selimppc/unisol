@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
        <h1>Welcome to Examiners : <strong></strong> </h1> <br>
        {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
            <table id="example" class="table table-striped  table-bordered"  >
                  <thead>
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                    </div>
                                    <div class="pull-right col-sm-6">
                                        <div class="btn-group" style="margin-right: 10px">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                      data-target="#AddExaminer">
                                                        Add Examiner
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </div>


                       <strong> Year: </strong>{{ Year::getYearsName($year_id) }}
                       </br>
                       <strong> Semester: </strong>{{ Semester::getSemesterName($semester_id) }}
                       </br>
                       <strong> Course Title: </strong>{{ $course_title }}
                       </br>
                       <strong> Exam Type: </strong>{{ AcmMarksDistItem::AcmMarksDistName($acm_marks_dist_item_id) }} </br>
                       </br>

                       {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                         <br>
                         <tr>
                            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                            <th>Name of Examiner</th>
                            <th>Dept</th>
                            <th>Status</th>
                            <th>Action</th>
                         </tr>
              </thead>
              <tbody>
                  @foreach($examiners_home as $examiners_list)
                        <tr>
                            <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $examiners_list['id'] }}"></td>



                           <td> {{ HTML::linkAction('ExmAmwController@viewExaminers',
                            ($examiners_list->relUser->relUserProfile->first_name.'
                            '.$examiners_list->relUser->relUserProfile->middle_name.'
                            '.$examiners_list->relUser->relUserProfile->last_name),['id'=>$examiners_list->id],
                            ['data-toggle'=>"modal", 'data-target'=>"#modal"]
                            ) }} </td>

                             <td>{{ $examiners_list->relExmExamList->relCourseManagement->relCourse->relSubject->relDepartment->title }}</td>


                             {{--<td>{{ $examiners_list->type }} </td>--}}
                             {{--<td> {{ $examiners_list->assigned_by }} </td>--}}
                             {{--<td> {{ $examiners_list->deadline }} </td>--}}
                             {{--<td> {{ $examiners_list->note }} </td>--}}

                             <td>{{ $examiners_list->status }} </td>


                            <td>
                                  <a href="{{ URL::route('examination.amw.viewExaminers', ['id'=>$examiners_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="View" href="#">View</a>
                            </td>
                        </tr>
                  @endforeach

              </tbody>
            </table>
        {{form::close() }}
{{--        {{ $examiners_home->links() }}--}}


@include('examination::amw.prepare_question_paper._modal._common_modal')
@include('examination::amw.prepare_question_paper._modal._add_examiner')

@stop
