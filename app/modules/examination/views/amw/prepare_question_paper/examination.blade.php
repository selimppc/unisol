@extends('layouts.master')
@section('sidebar')
    @include('examination::_sidebar')
@stop
@section('content')
        <h1>Welcome to Examination : <strong>{{ ucwords(Auth::user()->username) }}</strong> </h1> <br>
                    {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}
                        <table id="example" class="table table-striped  table-bordered"  >
                                    <thead>
                                          <div class="btn-group" style="margin-right: 10px">
                                                <button type="button" class="btn btn-default" data-toggle="modal"
                                                          data-target="#AddExamination">
                                                            Add Examination
                                                </button>
                                          </div>
                                         <br>
                                           {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                                         <br>
                                         <tr>
                                            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                            <th>Title</th>
                                            {{--<th>Deadline</th>--}}
                                            {{--<th>Department</th>--}}
                                            {{--<th>Year</th>--}}
                                            {{--<th>Term</th>--}}
                                            {{--<th>Assigned</th>--}}
                                            <th>Action</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($examination as $exam_list)
                                            <tr>
                                                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $exam_list['id'] }}"></td>
                                                <td>{{ $exam_list->title }} </td>


                                                <td>
                                                   <a href="{{ URL::route('examination.amw.viewExamination', ['id'=>$exam_list->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewExamination" data-placement="left" title="Show" href="#">View</a>
                                                   <a href="{{ URL::route('examination.amw.editExamination', ['id'=>$exam_list->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#EditExamination" data-placement="left" title="Edit" href="#">Edit</a>

                                                </td>
                                            </tr>
                                      @endforeach
                                    </tbody>
                        </table>
                    {{form::close() }}

@include('examination::amw.prepare_question_paper._modal')
@stop
