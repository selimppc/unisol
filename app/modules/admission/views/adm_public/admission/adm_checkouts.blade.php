@extends('layouts.layout')
 @section('sidebar')
   @include('layouts._sidebar_applicant')
 @stop
@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.applicant_details',['batch-applicant-id'=>Auth::applicant()->get()->id])}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>
<h3 class="box-title">Degree List</h3>
<div class="box box-solid ">
     <div class="box-tools pull-right">
         <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
         <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
     </div>

     <div class="box box-info">
           <div class="box-header">

           </div>
           <div class="box-body">
                <div class="row">

                    <div class="col-lg-12">
                       <table class="table  table-bordered">
                             <tbody>
                                 <tr>
                                     <th rowspan="70%" style="vertical-align: middle"><b style="font-size: medium">Degree Name</b></th>
                                 </tr>
                                 @foreach($batch_applicant as $value)

                                     <tr>
                                          <td class="col-lg-10">
                                                <a href="{{ URL::route('admission.applicant.admission.test_details',
                                                    ['id' => $value->id]) }}">
                                                    {{ $value->relBatch->relDegree->title }} Of {{$value->relBatch->relDegree->relDegreeGroup->title}} On {{$value->relBatch->relDegree->relDepartment->title}}
                                                </a>, Batch :{{ $value->relBatch->batch_number }}
                                          </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                       </table>
                    </div>
                </div>
           </div>

           <div class="box-footer clearfix">
               <a class="pull-right btn btn-xs btn-info" href="{{ URL::route('admission.applicant.add-degree' )}}" data-toggle="modal" data-target="#addDegreeModal"> Add more degree</a>
           </div>
     </div>
</div>


<div class="box box-solid ">
    <div class="box-tools pull-right">
        <button class="btn btn-success btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-success btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>

    <div class="box box-info">
        <div class="box-header">
        <h4 class="box-title">Application Fees Info</h4>
        </div>
        <div class="box-body">
             <div class="row">

                 <div class="col-lg-12">
                    <table class="table  table-bordered">
                            <tr>
                                <th class="col-lg-6">Application Charge Per Degree</th>
                                <td>1000</td>
                            </tr>
                            <tr>
                                <th class="col-lg-6"><b>Total</b></th>
                                <td>3000</td>
                            </tr>
                    </table>
                 </div>
             </div>
        </div>

        <div class="box-footer clearfix">
            <button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>
        </div>
    </div>

</div>

 <div class="box box-solid">
    <div class="box-header">
       <div class="box-tools pull-right">
           <button class="btn btn-info btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button class="btn btn-info btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
       </div>
       <div class="box box-info">
           <h4 class="box-title">Application Fees Info</h4>
       </div>
       <p>&nbsp;</p>
       <form class="form-inline" role="form">
          <div class="form-group">
             <label class="col-lg-12 control-label">Please Select Any One :</label>
             <br>
             <div class="col-xs-12">
                  <label class="radio-inline"><input type="radio" name="radio" id="bank" value="bank"><b>Bank</b></label>
                  <label class="radio-inline"><input type="radio" name="radio" id="bkash" value="bkash"> <b>Bkash</b></label>
                  <label class="radio-inline"><input type="radio" name="radio" id="credt_card" value="credtcard"> <b>Credit Card</b> </label>

                    <br><br>
                  <a class="pull-right btn btn-sm btn-default" id="ch_bank" style="display: none;"  href=""><b>Checkout With Bank</b></a>
                  <a class="pull-right btn btn-sm btn-default"  id="ch_bkash" style="display:none" href=""><b>Checkout With Bkash</b></a>
                  <a class="pull-right btn btn-sm btn-default" id="ch_credt_card" style="display:none" href=""><b>Checkout With CC</b></a>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
             </div>
             <br>
          </div>
       </form>
    </div>
 </div>

{{------------------------------------ Modal --------------------------------------------------------------------------}}
 <div class="modal fade" id="addDegreeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">

        </div>
       </div>
 </div>

@stop

