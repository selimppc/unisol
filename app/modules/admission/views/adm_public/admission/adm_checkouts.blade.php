@extends('layouts.layout')
 @section('sidebar')
   @include('layouts._sidebar_applicant')
 @stop
@section('content')

<div class="box box-solid box-info">
     <div class="box-header">
             <h3 class="box-title">Admission On</h3>
             <div class="box-tools pull-right">
                 <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
     </div>

     <div class="box box-info">
           <div class="box-header">
           <p>&nbsp;</p>
           </div>
           <div class="box-body">
                <div class="row">

                    <div class="col-lg-12">
                       <table class="table  table-bordered">
                             <tbody>
                                 <tr>
                                     <th rowspan="70%" style="vertical-align: middle"><b style="font-size: medium">Degree Name</b></th>
                                 </tr>
                                 @foreach($degree_applicant as $value)

                                     <tr>
                                          <td class="col-lg-10">
                                                <a href="{{ URL::route('admission.adm_test_details',
                                                    ['degree_id' => $value->id]) }}">
                                                    {{ $value->relDegree->title }}
                                                </a>
                                          </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                       </table>
                    </div>
                </div>
           </div>

           <div class="box-footer clearfix">
               <button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>
           </div>
     </div>
</div>

@stop