@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
    <h2> Admission Test</h2>

     {{ Form::open(array('url' => 'admission/faculty/batch-admtest-subject/batchDelete')) }}

                <div class="row">
                      {{--<div class="col-sm-12">--}}
                              {{--{{ Form::open(array('url' => 'admission/faculty/batch-admtest-subject/search-admtest-subject-index')) }}--}}
                                {{--<div class="col-sm-8">--}}
                                     {{--<div class="col-sm-3">--}}
                                              {{--{{ Form::label('year_id', 'Year') }}--}}
                                              {{--{{ Form::select('year_id',$year_id, Input::old('year_id'), array('class' => 'form-control','required'=>'required') ) }}--}}

                                     {{--</div>--}}
                                     {{--<div class="col-sm-3">--}}
                                              {{--{{ Form::label('semester_id', 'Semester') }}--}}
                                              {{--{{ Form::select('semester_id',$semester_id, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}--}}

                                     {{--</div>--}}
                                     {{--<div class="col-sm-2">--}}
                                         {{--</br>--}}
                                         {{--{{ Form::submit('Filter', array('class'=>'btn btn-success btn-xs'))}}--}}
                                     {{--</div>--}}
                                {{--</div>--}}
                              {{--{{ Form::close() }}--}}
                       {{--</div>--}}
                </div>



                    <table id="example" class="table table-striped  table-bordered"  >
                          <thead>
                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                                 <br>
                                 <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th>Degree</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Credit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                      </thead>
                      <tbody>

                          @foreach($index_admtest_subject as $index_admtest_subject_list)
                                <tr>
                                    <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $index_admtest_subject_list['id'] }}"></td>

                                     <td>{{ $index_admtest_subject_list->batch_id }}</td>

                                     <td>{{ $index_admtest_subject_list->admtest_subject_id }}</td>

                                     <td>{{ $index_admtest_subject_list->description }}</td>

                                     <td>{{ $index_admtest_subject_list->marks }}</td>

                                     <td>{{ $index_admtest_subject_list->modify_marks }}</td>

                                     <td>{{ $index_admtest_subject_list->duration }}</td>

                                     <td>{{ $index_admtest_subject_list->status }} </td>

                                    <td>
                                          <a href="{{URL::previous()}}" class="btn btn-default btn-xs">cancel</a>
                                    </td>
                                </tr>
                          @endforeach
                      </tbody>
                    </table>
     {{ Form::close() }}


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
        </div>
</div>
@stop