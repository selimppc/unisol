@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h1><strong>Welcome to ADm Test Degree Management </strong> </h1> <br>

<div class="row">
           <div class="col-sm-12">
                <div class="pull-left col-sm-8">
                       {{ Form::open(array('url' => 'admission_test/amw/search-adm-test-degree')) }}
                                <div class="col-sm-3">
                                         {{ Form::label('year_id', 'Year') }}
                                         {{ Form::select('year_id',$year, Input::old('year_id'), array('class' => 'form-control','required'=>'required') ) }}

                                </div>
                                <div class="col-sm-3">
                                         {{ Form::label('semester_id', 'Semester') }}
                                         {{ Form::select('semester_id',$semester, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}

                                </div>
                                <div class="col-sm-2">
                                    </br>
                                    {{ Form::submit('Filter', array('class'=>'btn btn-success btn-xs'))}}
                                </div>
                       {{ Form::close() }}
                </div>

               <div class="pull-right col-sm-4">
                       <div class="btn-group" style="margin-right: 10px">
                           <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                      data-target="#addDegreeModal">
                                        Add Degree
                           </button>
                       </div>
               </div>
           </div>
       </div>

      {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}
          <table id="example" class="table table-striped  table-bordered"  >
             <thead>
                {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                    <br>
                    <tr>
                       <th><input name="id" id="checkbox" type="checkbox" class="checkbox" value=""></th>
                       <th>Title</th>
                       <th>Dept</th>
                       <th>Year</th>
                       <th>Term</th>
                       <th>Credit</th>
                       <th>Duration(Year)</th>
                       <th>Status</th>
                       <th>Action</th>
                    </tr>
             </thead>
                 <tbody>
                     @foreach($degree_management as $adm_test_mgt)
                           <tr>
                               <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_test_mgt['id'] }}"></td>
                               <td>{{ $adm_test_mgt->title }}</td>
                               <td>{{ Department::getDepartmentName($adm_test_mgt->department_id) }}</td>
                               <td>{{ Year::getYearsName($adm_test_mgt->year_id) }}</td>
                               <td>{{ Semester::getSemesterName($adm_test_mgt->semester_id) }}</td>
                               <td>{{ $adm_test_mgt->total_credit }}</td>
                               <td style="text-align: center">{{ $adm_test_mgt->duration }}</td>
                               <td>{{ $adm_test_mgt->status}}</td>
                               <td>

                                  <a href="{{ URL::route('admission_test.amw.view_degree_management', ['id'=>$adm_test_mgt->id])  }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>
                                  <a href="{{ URL::route('admission_test.amw.edit_degree_management', ['id'=>$adm_test_mgt->id])  }}" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>

                                  <a href="{{ URL::to('admission_test/amw/mng_adm_test_subject') }}" class="btn btn-primary btn-xs" >MW</a>
                                  <a href="{{ URL::to('admission_test/amw/mng_adm_test_subject') }}" class="btn btn-success btn-xs" >MA</a>
                                  <a href="{{ URL::to('admission_test/amw/mng_adm_test_subject') }}" class="btn btn-info btn-xs" >MATS</a>

                               </td>
                           </tr>
                     @endforeach
                 </tbody>
          </table>
      {{form::close() }}

      {{ $degree_management->links() }}


   <p>&nbsp;</p><p>&nbsp;</p>
       @include('admission::amw.admission_test._modal._common_modal')


       {{-- Add Degree Modal --}}
       <div class="modal fade" id="addDegreeModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" >
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       <h4 class="modal-title" id="myModalLabel">Add Degree</h4>
                   </div>
                   <div class="modal-body">
                       {{ Form::open(array('route' => 'admission_test.amw.store_degree_management', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
                            @include('admission::amw/admission_test/_adm_test_degree_form')
                       {{ Form::close() }}
                   </div>
                   <div class="modal-footer">
                   </div>
               </div>
           </div>
       </div>


@stop