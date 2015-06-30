@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h3>Admission Test (Examiner and Questions) </h3>

<div class="row">
<div class="box box-solid ">
<div class="box-body">
  <div class="col-sm-12">
    {{ Form::open(array('url' => 'admission/amw/admission-test-home')) }}
      <div class="col-sm-8">
       <div class="col-sm-3">
        {{ Form::label('year_id', 'Year') }}
        {{ Form::select('year_id', $year_id, Input::old('year_id'), array('class' => 'form-control','required'=>'required') ) }}
       </div>
       <div class="col-sm-3">
        {{ Form::label('semester_id', 'Semester') }}
        {{ Form::select('semester_id', $semester_id, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}
       </div>
       <div class="col-sm-2" style="padding-top: 1%">
       </br>
       {{ Form::submit('Filter', array('class'=>'btn btn-success btn-sm' ))}}
       </div>
      </div>
    {{ Form::close() }}

  </div>


  {{ Form::open(array('url' => 'admission/amw/adm-test-home/batchDelete')) }}
      <table id="example" class="table table-striped  table-bordered"  >
         <thead>
            {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                <br>
                <tr>
                   <th><input name="id" id="checkbox" type="checkbox" class="checkbox" value=""></th>
                   <th>Degree</th>
                   <th>Dept</th>
                   <th>BN</th>
                   <th>Year</th>
                   <th>Term</th>
                   <th>Credit</th>
                   <th>Duration(Year)</th>
                   <th>QPE Status</th>
                   <th>Action</th>
                </tr>
         </thead>
             <tbody>
                @if(isset($admission_test_home))
                 @foreach($admission_test_home as $values)
                     @if(isset($values->relBatch))
                       <tr>
                           <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $values->id }}"></td>
                           <td>{{ $values->relBatch->relDegree->relDegreeLevel->code.''.$values->relBatch->relDegree->relDegreeGroup->code.' In '.$values->relBatch->relDegree->relDegreeProgram->code }}</td>
                           <td>{{ isset($values->relBatch->relDegree->relDepartment->title) ? $values->relBatch->relDegree->relDepartment->title : '' }}</td>
                           <td>{{ isset($values->relBatch->batch_number) ? $values->relBatch->batch_number : '' }}</td>
                           <td>{{ isset($values->relBatch->relYear->title) ? $values->relBatch->relYear->title : '' }}</td>
                           <td>{{ isset($values->relBatch->relSemester->title)? $values->relBatch->relSemester->title : '' }}</td>
                           <td>{{ isset($values->relBatch->relDegree->total_credit) ?$values->relBatch->relDegree->total_credit : '' }}</td>
                           <td >{{ isset($values->relBatch->relDegree->duration) ? $values->relBatch->relDegree->duration : '' }}</td>
                           <td> QPE Status </td>
                           <td>
                              <a href="{{ URL::to('admission/amw/admission-test-examiner', [ 'batch_id'=>$values->batch_id ]) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="bottom" title="Examiner">EX</a>
                              <a href="{{ URL::to('admission/amw/admission-test-question', [ 'batch_id'=>$values->batch_id ]) }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="bottom" title="Question Paper">QP</a>
                              <a href="{{ URL::route('admission.amw.question-paper-evaluation', [ 'bats_id'=>$values->batch_id ] ) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="bottom" title="Question Paper Evaluation">QPE</a>
                              <a href="{{ Route('admission.amw.exam-seat', [ 'batch_id'=>$values->batch_id ] ) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#exam-seat" title="Exam Seat">Exam Seat</a>
                           </td>
                       </tr>
                     @endif
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

{{-- Modal Area --}}
<div class="modal fade" id="exam-seat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>


@stop