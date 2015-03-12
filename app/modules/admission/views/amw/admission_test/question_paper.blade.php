@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

     <h1>Welcome to Prepare Question paper <strong></strong> </h1> <br>
            {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}

                <div class="row">
                        <div class="col-sm-12">
                           <div class="pull-right col-sm-6">
                               <div class="btn-group" style="margin-right: 10px">
                                   <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                             data-target="#CreateQuestionPaperModal">
                                               Create Question Paper
                                   </button>
                               </div>
                           </div>
                           <div class="col-sm-6">
                                <strong> Department: </strong>{{ $data }}
                                </br>
                                <strong> Year: </strong>{{ Year::getYearsName($year_id) }}
                                </br>
                                <strong> Degree: </strong>{{ Degree::getDegreeName($degree_id) }}
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
                            @foreach($adm_question_paper as $adm_question_paper_list)
                                  <tr>
                                      <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_question_paper_list['id'] }}"></td>

                                      <td>{{ $adm_question_paper_list->title }}</td>

                                      <td>{{ $adm_question_paper_list->deadline }}</td>

                                      <td>subject</td>

                                      <td>not assigned </td>

                                      <td> {{ $adm_question_paper_list->status }} </td>


                                      <td>
                                         <a href="{{ URL::route('admission_test.amw.view_question_paper', ['id'=>$adm_question_paper_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>
                                         <a href="{{ URL::route('admission_test.amw.edit_question_paper', ['id'=>$adm_question_paper_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>

                                         <a href="" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#">VQs</a>
                                         <a href="" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Assign Faculty" href="#">AF</a>
                                      </td>
                                  </tr>
                            @endforeach
                      </tbody>
              </table>

          {{form::close() }}

{{--          {{ $adm_question_paper->links() }}--}}

{{--@include('admission::amw.admission_test._modal._create_question_paper')--}}
@include('admission::amw.admission_test._modal._common_modal')

{{-- CreateQuestionPaperModal --}}
<div class="modal fade" id="CreateQuestionPaperModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Question paper</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array('route' => 'admission_test.amw.store_question_paper', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
                     @include('admission::amw/admission_test/_form')
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


@stop