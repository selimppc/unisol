@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

     <h1>Welcome to Examiners <strong></strong> </h1> <br>
            {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}

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


                <table id="example" class="table table-striped  table-bordered"  >
                      <thead>
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
                                <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_examiners_list['id'] }}"></td>

                                 <td>
                                    {{ HTML::linkAction('AdmissionController@viewExaminers',
                                    ($adm_examiners_list->relUser->relUserProfile->first_name.'
                                    '.$adm_examiners_list->relUser->relUserProfile->middle_name.'
                                    '.$adm_examiners_list->relUser->relUserProfile->last_name),['id'=>$adm_examiners_list->id],
                                    ['data-toggle'=>"modal", 'data-target'=>"#modal"]
                                    ) }}
                                 </td>

                                 <td>{{ $adm_examiners_list->status }} </td>

                                <td>
                                      <a href="{{URL::previous()}}" class="btn btn-default btn-xs">cancel</a>
                                </td>
                            </tr>
                      @endforeach
                  </tbody>
                </table>
            {{form::close() }}

            {{ $adm_examiners_home->links() }}



    @include('admission::amw.admission_test._modal._common_modal')

    {{--     Add Examiner Modal --}}
    <div class="modal fade" id="AddExaminer" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Examiner</h4>
                </div>

                <div class="modal-body">
                    {{ Form::open(array('route' => 'admission_test.amw.store_examiners', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
{{--                        {{ Form::text('adm_examiners_home', $adm_examiners_home ) }}--}}
                            @include('admission::amw.admission_test._add_examiners_form')
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


@stop
