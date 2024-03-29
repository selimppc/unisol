@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h1><strong>Welcome to Admission Test Management </strong> </h1> <br>

  <div class="row">
      <div class="col-sm-12">
        {{ Form::open(array('url' => 'admission_test/amw/search-index')) }}
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

      {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}
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
                       <th>Status</th>
                       <th>Credit</th>
                       <th>Duration(Year)</th>
                       <th>QPE Status</th>
                       <th>Action</th>
                    </tr>
             </thead>
                 <tbody>
                     @foreach($admission_test as $adm_test_mgt)
                           <tr>
                               <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_test_mgt['id'] }}"></td>
                               <td>{{ $adm_test_mgt->title }}</td>
                               <td>{{ Department::getDepartmentName($adm_test_mgt->department_id) }}</td>
                               <td>{{ Year::getYearsName($adm_test_mgt->year_id) }}</td>
                               <td>{{ Semester::getSemesterName($adm_test_mgt->semester_id) }}</td>
                               <td>{{ $adm_test_mgt->status}}</td>
                               <td>{{ $adm_test_mgt->total_credit }}</td>
                               <td style="text-align: center">{{ $adm_test_mgt->duration }}</td>
                               <td>QPE Status</td>
                               <td>
                                  <a href="{{ URL::route('admission_test.amw.examiners', ['year_id'=>$adm_test_mgt->year_id , 'semester_id'=>$adm_test_mgt->semester_id , 'degree_id'=>$adm_test_mgt->id ])  }}" class="btn btn-default btn-xs" >EX</a>
                                  <a href="{{ URL::route('admission_test.amw.question_paper', ['year_id'=>$adm_test_mgt->year_id , 'semester_id'=>$adm_test_mgt->semester_id , 'degree_id'=>$adm_test_mgt->id ])  }}" class="btn btn-default btn-xs" >QP</a>
                               </td>
                           </tr>
                     @endforeach
                 </tbody>
          </table>
      {{form::close() }}

      {{ $admission_test->links() }}


   <p>&nbsp;</p><p>&nbsp;</p>
       @include('admission::amw.admission_test._modal._common_modal')
@stop