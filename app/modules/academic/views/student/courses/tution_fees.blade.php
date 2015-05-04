@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_student')
@stop
@section('content')

<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('academic.student.courses.index')}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>

<h4 class="box-title"><b>Course Enrollment At {{$semester_title }} ,{{$year_title}}</b></h4>

 <div class="box box-solid ">
     <div class="box-tools pull-right">

     </div>
     <div class="box box-success">
         <div class="box-body">
             <div class="row">
                 <div class="col-lg-12">
                        <table class="table table-bordered table-striped">
                               <thead>
                                     <tr>
                                         <th>Course</th>
                                         <th>Credit</th>
                                     </tr>
                               </thead>
                               <tbody>
                                    @if(isset($enrolled_courses))
                                         @foreach($enrolled_courses as $value)
                                            <tr>
                                               <td>{{$value->relBatchCourse->relCourse->title}}</td>
                                               <td>{{$value->relBatchCourse->relCourse->credit}}</td>
                                            </tr>
                                         @endforeach
                                    @else
                                        {{"No Data found !"}}
                                    @endif
                               </tbody>
                        </table>

                        <br>
                        <strong style="font-size: medium">Total Credit : <b>{{ $total_credit->total_credit }} </b></strong>
                 </div>
             </div>
         </div>
     </div>
 </div>
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

                                   </tbody>

                               </table>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
{{--------------------------------------------------------------------------------------}}


<a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('academic.student.checkout',['year_title'=>$year_title,'semester_title'=>$semester_title])}}"><b><i class="fa fa-arrow-circle-right"></i> Checkout</b></a>
<p>&nbsp;</p>
<p>&nbsp;</p>




@stop
