@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h1><strong>Admission Test Management </strong> </h1> <br>

  <div class="row">
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
               <div class="col-sm-2">
                   </br>
                   {{ Form::submit('Filter', array('class'=>'btn btn-success btn-xs'))}}
               </div>
          </div>
        {{ Form::close() }}

      </div>
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
                    @if(isset($admission_test_batch))
                         @foreach($admission_test_batch as $adm_test_mgt)
                               <tr>
                                   <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_test_mgt['id'] }}"></td>
    {{--                               <td>{{ $adm_test_mgt->relDegree->title }}</td>--}}
                                   <td>{{ $adm_test_mgt->relDegree->relDegreeProgram->code.''.$adm_test_mgt->relDegree->relDegreeGroup->code }}</td>
                                   <td>{{ $adm_test_mgt->relDegree->relDepartment->title }}</td>
                                   <td>{{ $adm_test_mgt->relYear->title }}</td>
                                   <td>{{ $adm_test_mgt->relSemester->title }}</td>
                                   <td>{{ $adm_test_mgt->relDegree->total_credit }}</td>
                                   <td style="text-align: center">{{ $adm_test_mgt->relDegree->duration }}</td>
                                   <td>QPE Status</td>
                                   <td>
                                      {{--<a href="{{ URL::route('admission.amw.admission-examiner-index', ['year_id'=>$adm_test_mgt->year_id , 'semester_id'=>$adm_test_mgt->semester_id , 'degree_id'=>$adm_test_mgt->degree_id ])  }}" class="btn btn-default btn-xs" >EX</a>--}}
                                      <a href="{{ URL::route('admission.amw.admission-test-examiner') }}" class="btn btn-default btn-xs" >EX</a>
                                      <a href="{{ URL::route('admission.amw.admission-test-question') }}" class="btn btn-default btn-xs" >QP</a>
                                      <a href="{{ URL::route('admission.amw.admission-question-evaluation') }}" class="btn btn-default btn-xs" >QPE</a>
                                   </td>
                               </tr>
                         @endforeach
                     @endif
                 </tbody>
          </table>
      {{form::close() }}

      {{--{{ $admission_test_batch->links() }}--}}


   <p>&nbsp;</p><p>&nbsp;</p>



@stop