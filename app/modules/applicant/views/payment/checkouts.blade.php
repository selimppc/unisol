@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
 @section('sidebar')
   @include('layouts._sidebar_applicant')
 @stop
@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('applicant.details')}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>
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
                                 @if(isset($data))
                                     @foreach($data as $value)
                                         <tr>
                                              <td class="col-lg-10">
                                              {{$value->relDegree->relDegreeLevel->code.''.$value->relDegree->relDegreeGroup->code.' In '.$value->relDegree->relDegreeProgram->code}}&nbsp;&nbsp;  Batch #:{{ $value->batch_number }}
                                                    <a href="{{ URL::route('admission.applicant.admission.test_details',
                                                       ['batch_id' => $value->id]) }}" class="btn-link" title="Degree,Subject & Exam Center Info For Admission" data-toggle="modal" data-target="#ATDModal">ATD</a>
                                              </td>
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
{{------------------------------------Payment Option --------------------------------------------------------------------------}}
<div class="box box-solid">
    <div class="box-header">
       <div class="box-tools pull-right">
           <button class="btn btn-info btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
           <button class="btn btn-info btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
       </div>
       <div class="box box-info">
           <h4 class="box-title">Payment Option</h4>
       </div>
       <p>&nbsp;</p>
       <form class="form-inline" role="form">
          <div class="form-group">
             <label class="col-lg-12 control-label">Please Select Any One :</label>
             <br>
             <div class="col-xs-12">
                  <label class="radio-inline"></label>
                  <label class="radio-inline"><input type="radio" name="radio" id="bank" value="bank"> <b>Bank</b></label>
                  <label class="radio-inline"><input type="radio" name="radio" id="credt_card" value="credtcard"> <b>Credit Card</b> </label>

                  &nbsp;&nbsp;&nbsp;&nbsp;<a class="pull-right btn btn-sm btn-default"  id="ch_bank" style="display:none" href="{{Route('applicant.payment.checkout-bank')}}"><b>Checkout With Bank</b></a>
                  &nbsp;&nbsp;&nbsp;&nbsp;<a class="pull-right btn btn-sm btn-default" id="ch_credt_card" style="display:none" href="{{Route('applicant.payment.checkout-cc')}}"><b>Checkout With Credit Card</b></a>

                  <p>&nbsp;</p>
                  <b style="color: lightcoral">It is convey that to pay application charge you have two options. For bank you need to pay 1000BDT first.<br> Bank Information :<br>Bank Name :XXX Bank Ltd.<br>Account Name: Mr. Karim<br>Account :#34534543654645.<br><br>**And If You Have Credit Card Then You Can Pay That Instantly.
                  </b>
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

 <div class="modal fade" id="ATDModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
      </div>
    </div>
 </div>

@stop

