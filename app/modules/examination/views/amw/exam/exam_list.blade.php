@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h3>Examination</h3>

<div class="row">
<div class="box box-solid ">
<div class="box-body">
  <div class="col-sm-12">
    {{--{{ Form::open(array('url' => 'admission/amw/admission-test-home')) }}--}}
      {{--<div class="col-sm-8">--}}
       {{--<div class="col-sm-3">--}}
        {{--{{ Form::label('year_id', 'Year') }}--}}
        {{--{{ Form::select('year_id', $year_id, Input::old('year_id'), array('class' => 'form-control','required'=>'required') ) }}--}}
       {{--</div>--}}
       {{--<div class="col-sm-3">--}}
        {{--{{ Form::label('semester_id', 'Semester') }}--}}
        {{--{{ Form::select('semester_id', $semester_id, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}--}}
       {{--</div>--}}
       {{--<div class="col-sm-2" style="padding-top: 1%">--}}
       {{--</br>--}}
       {{--{{ Form::submit('Filter', array('class'=>'btn btn-success btn-sm' ))}}--}}
       {{--</div>--}}
      {{--</div>--}}
    {{--{{ Form::close() }}--}}

  </div>


  {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
                 <table id="example" class="table table-striped  table-bordered"  >
                        <thead>
                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                               <br>
                               <tr>
                                  <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                  <th>Title</th>
                                  <th>Dept</th>
                                  <th>Course</th>
                                  <th>Type</th>
                                  <th>Year</th>
                                  <th>Term</th>
                                  <th>Action</th>
                               </tr>
                        </thead>
                        <tbody>
                            @if(isset($exam_data))
                                @foreach($exam_data as $exam_list)
                                      <tr>
                                          <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                                          <td>{{ $exam_list->title }}</td>
                                          <td>{{ $exam_list->relCourseConduct->relCourse->relSubject->relDepartment->title}}</td>
                                          <td>{{ $exam_list->relCourseConduct->relCourse->title}}</td>
                                          <td>{{ $exam_list->relAcmMarksDistItem['title']}}</td>
                                          <td></td>
                                          <td></td>

                                          <td>
                                             {{--<a href="{{ URL::route('examination.amw.viewExamination', ['id'=>$exam_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>--}}
                                             {{--<a href="{{ URL::route('examination.amw.editExamination', ['id'=>$exam_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>--}}
                                          </td>
                                      </tr>
                                @endforeach
                            @endif
                        </tbody>
                 </table>
             {{form::close() }}
  {{--{{ $admission_test_home->links() }}--}}


<p>&nbsp;</p><p>&nbsp;</p>

</div>
</div>
</div>

@stop