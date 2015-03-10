@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

     <h1>Welcome to Examiners <strong></strong> </h1> <br>
            {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}
                <table id="example" class="table table-striped  table-bordered"  >
                      <thead>
                            <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <strong> Year: </strong>{{ Year::getYearsName($year_id) }}
                                            </br>
                                            <strong> Semester: </strong>{{ Semester::getSemesterName($semester_id) }}
                                            </br>
                                            <strong> Degree: </strong>{{ Degree::getDegreeName($degree_id) }}
                                            </br>
                                            <strong> Department: </strong>{{ $data  }}
                                            </br>
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
                                <th>Status</th>
                                <th>Action</th>
                             </tr>
                  </thead>
                  <tbody>
                      @foreach($adm_examiners_home as $adm_examiners_list)
                            <tr>
                                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $adm_examiners_list['id'] }}"></td>

                                 <td>
                                    {{ HTML::linkAction('AdmAmwController@viewExaminers',
                                    ($adm_examiners_list->relUser->relUserProfile->first_name.'
                                    '.$adm_examiners_list->relUser->relUserProfile->middle_name.'
                                    '.$adm_examiners_list->relUser->relUserProfile->last_name),['id'=>$adm_examiners_list->id],
                                    ['data-toggle'=>"modal", 'data-target'=>"#modal"]
                                    ) }}
                                 </td>

                                 <td>{{ $adm_examiners_list->status }} </td>

                                <td>
                                      <a href="#" class="btn btn-default btn-xs">cancel</a>
                                </td>
                            </tr>
                      @endforeach
                  </tbody>
                </table>
            {{form::close() }}

            {{ $adm_examiners_home->links() }}



    @include('admission::amw.admission_test._modal._common_modal')
    @include('admission::amw.admission_test._modal._add_examiner')
@stop
