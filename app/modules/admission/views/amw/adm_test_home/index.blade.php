@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h3>Admission Test (Examiner and Questions) </h3>

<div class="row">
<div class="box box-solid ">
<div class="box-body">
  <div class="col-sm-12">
    {{ Form::open(array('url' => 'admission/amw/adm-test-home/search-adm-test-index')) }}
      <div class="col-sm-8">
       <div class="col-sm-3">
        {{ Form::label('year_id', 'Year') }}
        {{ Form::select('year_id',$year_id, Input::old('year_id'), array('class' => 'form-control','required'=>'required') ) }}
       </div>
       <div class="col-sm-3">
        {{ Form::label('semester_id', 'Semester') }}
        {{ Form::select('semester_id',$semester_id, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}
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
                 @foreach($admission_test_home as $adm_test_mgt)
                   <tr>
                       <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_test_mgt['id'] }}"></td>
                       <td>{{ $adm_test_mgt->relBatch->relDegree->relDegreeProgram->code.''.$adm_test_mgt->relBatch->relDegree->relDegreeGroup->code }}</td>
                       <td>{{ $adm_test_mgt->relBatch->relDegree->relDepartment->title }}</td>
                       <td>{{ $adm_test_mgt->relBatch->relYear->title }}</td>
                       <td>{{ $adm_test_mgt->relBatch->relSemester->title }}</td>
                       <td>{{ $adm_test_mgt->relBatch->relDegree->total_credit }}</td>
                       <td style="text-align: center">{{ $adm_test_mgt->duration }}</td>
                       <td>QPE Status</td>
                       <td>
                          <a href="{{ URL::to('admission/amw/admission-test-examiner', [ 'year_id'=>$adm_test_mgt->relBatch->year_id ,'semester_id'=>$adm_test_mgt->relBatch->semester_id ,'batch_id'=>$adm_test_mgt->batch_id ]) }}" class="btn btn-success btn-xs" >EX</a>
                          <a href="{{ URL::to('admission/amw/admission-test-question', [ 'bats_id'=>$adm_test_mgt->id ]) }}" class="btn btn-info btn-xs" >QP</a>
                          <a href="{{ URL::route('admission.amw.admission-question-evaluation') }}" class="btn btn-success btn-xs" >QPE</a>
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