@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h1><strong>Manage Admission Test Subject </strong> </h1> <br>

            {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}

            <div class="row">
                    <div class="col-sm-12">
                        <div class="pull-right col-sm-6">
                            <div class="btn-group" style="margin-right: 10px">
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                          data-target="#AddSubjectToDegree">
                                            Add Subject To Degree
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-6">
                            <strong> Degree: </strong> {{ $sbjct_dgre_name }}
                            </br>
                        </div>
                    </div>
            </div>


                <table id="example" class="table table-striped  table-bordered"  >
                      <thead>
                           {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                             <br>
                             <tr>
                                <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                <th>Subject</th>
                                <th>Marks</th>
                                 <th>Exam Duration</th>
                                <th>Action</th>
                             </tr>
                  </thead>
                  <tbody>
                      @foreach($degree_test_sbjct as $dgr_adm_tst_add_sbjct)
                            <tr>
                                <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $dgr_adm_tst_add_sbjct['id'] }}"></td>
                                <td>{{ AdmTestSubject::getTestSubjectName($dgr_adm_tst_add_sbjct->admtest_subject_id) }} </td>
                                <td>{{ $dgr_adm_tst_add_sbjct->marks }} </td>
                                <td>{{ $dgr_adm_tst_add_sbjct->duration }} </td>

                                <td>
                                      <a href="{{ URL::route('admission_test.amw.view_admtest_subject', ['id'=>$dgr_adm_tst_add_sbjct->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>
                                      <a href="{{ URL::route('admission_test.amw.edit_admtest_subject', ['id'=>$dgr_adm_tst_add_sbjct->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>
                                </td>
                            </tr>
                      @endforeach
                  </tbody>
                </table>
            {{form::close() }}

{{--            {{ $dgr_adm_tst_add_sbjct->links() }}--}}



    @include('admission::amw.admission_test._modal._common_modal')
    @include('admission::amw.admission_test._modal._add_subject_to_degree')
@stop
