@extends('layouts.master')
@section('sidebar')
    @include('examination::_sidebar')
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
                  @foreach($examiners_list as $examiners_list)
                        <tr>
                            <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $examiners_list['id'] }}"></td>

{{--                             <td>{{ HTML::linkAction('ExmAmwController@viewExaminers',($examiners_list->relUser->relUserProfile->first_name.' '.$examiners_list->relUser->relUserProfile->middle_name.' '.$examiners_list->relUser->relUserProfile->last_name),['id'=>$examiners_list->id]) }}</td>--}}
                             <td><span data-toggle="modal" data-target="#modal" data-placement="left" title="View" href="#">{{ HTML::linkAction('ExmAmwController@viewExaminers',($examiners_list->relUser->relUserProfile->first_name.' '.$examiners_list->relUser->relUserProfile->middle_name.' '.$examiners_list->relUser->relUserProfile->last_name),['id'=>$examiners_list->id]) }}</span></td>
                             {{--<td> <span href="{{ URL::route('examination.amw.viewExaminers',($examiners_list->relUser->relUserProfile->first_name),['id'=>$examiners_list->id]) }}" class="btn btn-default" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</span></td>--}}

                                {{--<td><label type="button" class="label" data-toggle="modal" data-target="#modal">--}}
                                 {{--{{ HTML::linkAction('ExmAmwController@viewExaminers',($examiners_list->relUser->relUserProfile->first_name.' '.$examiners_list->relUser->relUserProfile->middle_name.' '.$examiners_list->relUser->relUserProfile->last_name),['id'=>$examiners_list->id]) }}--}}
                                {{--</label></td>--}}

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

@include('examination::amw.prepare_question_paper._modal._common_modal')
@include('examination::amw.prepare_question_paper._modal._add_examiner')

@stop
