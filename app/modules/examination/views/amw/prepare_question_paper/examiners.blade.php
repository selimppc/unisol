@extends('layouts.master')
@section('sidebar')
    @include('examination::_sidebar')
@stop
@section('content')
        <h1>Welcome to Examiners : <strong>{{ ucwords(Auth::user()->username) }}</strong> </h1> <br>
        {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
            <table id="example" class="table table-striped  table-bordered"  >
                        <thead>
                                <div class="row">
                                        <div class="col-sm-12">
                                            <div class="col-sm-6">

                                            </div>
                                            <div class="pull-right col-sm-6">
                                                <div class="btn-group" style="margin-right: 10px">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                              data-target="#AddExaminer">
                                                                Add Examiner
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                </div>



                               <strong> Year :</strong>  {{--{{ Year::getYearsName($course_data->year_id) }} </br>--}}
                               </br>
                               <strong> Semester :</strong>{{--{{ Semester::getSemesterName($course_data->semester_id) }} </br>--}}
                               </br>
                               <strong> Course Title :</strong>{{--{{ Year::getYearsName($course_data->year_id) }} </br>--}}
                               </br>
                               <strong> Exam Type :</strong>{{--{{ Year::getYearsName($course_data->year_id) }} </br>--}}
                               </br>

                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                             <br>
                             <tr>
                                <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                <th>Name of Examiner</th>
                                <th>Dept</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>lamsam</th>
                                <th>jodumodu</th>

                                <th>qq</th>
                                <th>Action</th>
                             </tr>
                        </thead>
                        <tbody>
                          @foreach($examiners_home as $examiners_list)
                                <tr>
                                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $examiners_list['id'] }}"></td>
                                     <td> {{ $examiners_list->exm_exam_list_id }} </td>
                                     <td> {{ $examiners_list->user_id }} </td>
                                     <td> {{ $examiners_list->type }} </td>
                                     <td> {{ $examiners_list->assigned_by }} </td>
                                     <td> {{ $examiners_list->deadline }} </td>
                                     <td> {{ $examiners_list->note }} </td>
                                     <td> {{ $examiners_list->status }} </td>

                                    <td>
                                          <a href="{{ URL::route('examination.amw.viewExaminers', ['id'=>$examiners_list->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewExaminer" data-placement="left" title="Show" href="#">View</a>
                                    </td>
                                </tr>
                          @endforeach
                        </tbody>
            </table>
        {{form::close() }}

@include('examination::amw.prepare_question_paper._modal')
@stop
