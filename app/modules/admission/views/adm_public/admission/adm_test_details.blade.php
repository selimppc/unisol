@extends('layouts.layout')
@section('sidebar')

@stop
@section('content')
{{--<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.public.degree_offer_list')}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>--}}

<h3>Admission Test Details On </h3>
 <div class="box box-solid">

     <div class="box box-info">
          <div class="box-body">
             <div class="row">
                 <div class="col-lg-12">

                       <table>
                              <tr>
                                 <th>Degree Name :</th>
                                 <td>{{$adm_test_model->relBatch->relDegree->title}}</td>
                              </tr>
                              <tr>
                                  <th>Year :</th>
                                  <td>{{$adm_test_model->relBatch->relSemester->title}}</td>
                              </tr>
                              <tr>
                                 <th>Semester :</th>
                                 <td>{{$adm_test_model->relBatch->relYear->title}}</td>
                              </tr>
                              <tr>
                                 <th>Batch Number: </th>
                                 <td>{{$adm_test_model->relBatch->batch_number}}</td>
                              </tr>
                       </table>


                 </div>
             </div>
        </div>
     </div>
 </div>

 {{--------------- Admission Test Subjects  ----------------------------------------------------------}}

  <div class="box box-solid">
     <div class="box-header">
               <h4>Admission Test will be taken On </h4>
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
                                     @foreach($adm_test_subject as $value)
                                          <tr>
                                                 <td>{{$value->relAdmtestSubject->title}}</td>
                                                 <td>{{$value->marks}}</td>
                                                 <td>{{$value->duration}}</td>
                                          </tr>
                                     @endforeach
                              </tbody>
                        </table>
                  </div>
              </div>
         </div>
     </div>
  </div>


@stop

