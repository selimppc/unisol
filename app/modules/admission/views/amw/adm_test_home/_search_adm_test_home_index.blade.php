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


        <a href="{{ URL::to('admission/amw/admission-test-home') }}" class="btn btn-success" >Full List VIew</a>

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
                    @if(!empty($adm_test_home_data))
                         @foreach($adm_test_home_data as $values)
                               <tr>
                                   <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $values->id }}"></td>
    {{--                               <td>{{ $adm_test_mgt->relDegree->title }}</td>--}}
                                   <td>{{ $values->relDegree->relDegreeProgram->code.''.$adm_test_mgt->relDegree->relDegreeGroup->code }}</td>
                                   <td>{{ $values->relDegree->relDepartment->title }}</td>
                                   <td>{{ $values->relBatch->batch_number }}</td>
                                   <td>{{ $values->relYear->title }}</td>
                                   <td>{{ $values->relSemester->title }}</td>
                                   <td>{{ $values->relDegree->total_credit }}</td>
                                   <td>{{ $values->relDegree->duration }}</td>
                                   <td> QPE Status </td>
                                   <td>
                                      {{--<a href="{{ URL::route('admission.amw.admission-examiner-index', ['year_id'=>$adm_test_mgt->year_id , 'semester_id'=>$adm_test_mgt->semester_id , 'degree_id'=>$adm_test_mgt->degree_id ])  }}" class="btn btn-default btn-xs" >EX</a>--}}
                                      <a href="{{ URL::to('admission/amw/admission-test-examiner') }}" class="btn btn-default btn-xs" >EX</a>
                                      <a href="{{ URL::to('admission/amw/admission-test-question') }}" class="btn btn-default btn-xs" >QP</a>
                                      <a href="{{ URL::to('admission/amw/admission-question-evaluation') }}" class="btn btn-default btn-xs" >QPE</a>
                                   </td>
                               </tr>
                         @endforeach
                     @endif
                 </tbody>
          </table>
      {{form::close() }}

      {{--{{ $adm_test_home_data->links() }}--}}


   <p>&nbsp;</p><p>&nbsp;</p>



@stop