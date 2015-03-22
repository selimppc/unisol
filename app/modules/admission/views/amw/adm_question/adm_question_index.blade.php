@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

     <h1> Question paper <strong></strong> </h1> <br>
            {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}

               <div class="row">
                          <div class="col-sm-12">
                               <div class="pull-right col-sm-4">
                                  <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('admission/amw/admission-test-question/create-admtest-question-paper')}}" data-toggle="modal" data-target="#modal" >Create Question Paper</a>
                               </div>

                               <div class="col-sm-6">
                                    <strong> Department: </strong>
                                    </br>
                                    <strong> Year: </strong>
                                    </br>
                                    <strong> Degree: </strong>
                                    {{--{{ Degree::getDegreeName($degree_id) }}--}}

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
                             <th>Title</th>
                             <th>Deadline</th>
                             <th>Subject</th>
                             <th>Assigned</th>
                             <th>Status</th>
                             <th>Action</th>
                           </tr>
                      </thead>
                      <tbody>
                            @foreach($adm_test_question_paper as $adm_question_paper_list)
                                  <tr>
                                      <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_question_paper_list['id'] }}"></td>

                                      <td>{{ $adm_question_paper_list->title }}</td>

                                      <td>{{ $adm_question_paper_list->deadline }}</td>

                                      <td>subject</td>

                                      <td>not assigned </td>

                                      <td> {{ $adm_question_paper_list->status }} </td>


                                      <td>
                                         {{--<a href="{{ URL::route('admission_test.amw.admission-test-question.view_question_paper', ['id'=>$adm_question_paper_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>--}}
                                         {{--<a href="{{ URL::route('admission_test.amw.admission-test-question.edit_question_paper', ['id'=>$adm_question_paper_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>--}}

                                         {{--<a href="" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#">VQs</a>--}}
                                         {{--<a href="" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#">AF</a>--}}
                                      </td>
                                  </tr>
                            @endforeach
                      </tbody>
              </table>

          {{form::close() }}

{{--          {{ $adm_test_question_paper->links() }}--}}


@stop