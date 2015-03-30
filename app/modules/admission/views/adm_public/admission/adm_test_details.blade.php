@extends('layouts.layout')
@section('sidebar')

@stop
@section('content')
{{--<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.public.degree_offer_list')}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>--}}

 <h4>Admission Test Details On</h4>
 <div class="box box-solid">

     <div class="box box-info">
          <div class="box-body">
             <div class="row">
                 <div class="col-lg-12">

                       <table>
                              <tr>
                                 <th>Degree Name :</th>
                                 <td>{{$adm_test_details->relBatch->relDegree->title}}</td>
                              </tr>
                              <tr>
                                  <th>Year :</th>
                                  <td>{{$adm_test_details->relBatch->relSemester->title}}</td>
                              </tr>
                              <tr>
                                 <th>Semester :</th>
                                 <td>{{$adm_test_details->relBatch->relYear->title}}</td>
                              </tr>
                              <tr>
                                 <th>Batch Number: </th>
                                 <td>{{$adm_test_details->relBatch->batch_number}}</td>
                              </tr>
                       </table>


                 </div>
             </div>
        </div>
     </div>
 </div>

 {{--------------- Admission Test Subjects  ----------------------------------------------------------}}
<h5><b>Admission Test will be taken On </b></h5>
  <div class="box box-solid">
     <div class="box-header">

     </div>
     <div class="box box-info">
         <div class="box-body">
              <div class="row">
                  <div class="col-lg-12">

                        <table class="table table-bordered table-striped">
                              <thead>
                                   <tr>
                                          <th>Subject Name</th>
                                          <th>Marks</th>
                                          <th>Test Time Duration(in Minutes)</th>
                                   </tr>
                              </thead>
                              <tbody>
                                  @if(isset($adm_test_subject))
                                     @foreach($adm_test_subject as $value)
                                          <tr>
                                                 <td>{{$value->relAdmtestSubject->title}}</td>
                                                 <td>{{$value->marks}}</td>
                                                 <td>{{$value->duration}}</td>
                                          </tr>
                                     @endforeach
                                     @endif
                              </tbody>
                        </table>
                  </div>
              </div>
         </div>
     </div>
  </div>


@stop

