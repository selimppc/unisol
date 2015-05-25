@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
 @include('layouts._sidebar_student')
@stop
@section('content')

<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('academic.student.courses.obtained-marks',$batch_course_id)}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>

{{--<h4 class="box-title"><b>Exam Enrollment At {{$semester_title }} ,{{$year_title}}</b></h4>--}}
<h4 class="box-title"><b>Exam Enrollment</b></h4>

{{------------------ Cost Details -----------------------------------------------}}
 <div class="box box-info">
     <div class="box-body">
         <div class="row">
             <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                           <thead>
                                 <tr>
                                     <th>Items</th>
                                     <th>Qty</th>
                                     <th>Unit Cost </th>
                                     <th>Item Total</th>
                                     <th>Waiver</th>
                                     <th>Waiver Amount</th>
                                     <th>Partial Total</th>
                                 </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                              </tr>
                           </tbody>
                    </table>
             </div>
         </div>
     </div>
 </div>
{{--------------------------------------------Ends-------------------------------------}}

{{-------------------------------------Tution Fees Per Month --------------------------}}
<div class="box box-solid ">
                 <div class="box box-success">
                     <br>
                     <div class="col-lg-10">
                        <strong style="font-size: medium">Tution Fees Per Month :</strong>
                     </div>
                       <p>&nbsp;</p>
                     <div class="box-body">
                         <div class="row">
                             <div class="col-lg-12">
                               <table id="" class="table table-bordered table-striped">

                                   <tbody>
                                          {{--@foreach()--}}
                                          {{--@endforeach--}}
                                   </tbody>

                               </table>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
{{--------------------------------------------------------------------------------------}}

{{--<a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('academic.student.checkout')}}"><b><i class="fa fa-arrow-circle-right"></i> Checkout</b></a>--}}

<p>&nbsp;</p>
<p>&nbsp;</p>

@stop
