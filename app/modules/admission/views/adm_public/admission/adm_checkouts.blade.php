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

<div class="box box-solid box-success">
     <div class="box-header">
             <h3 class="box-title">Application Fees</h3>
             <div class="box-tools pull-right">
                 <button class="btn btn-success btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <button class="btn btn-success btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
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

<div class="box box-solid box-success">
     <div class="box-header">
             <h3 class="box-title">Payment Options</h3>
             <div class="box-tools pull-right">
                 <button class="btn btn-success btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <button class="btn btn-success btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
     </div>
     <form class="form-inline" role="form">

         <div class="form-group">
             <label class="col-lg-12 control-label">Please Select Any One :</label>
             <br>

             <div class="col-xs-12">
                  <label class="radio-inline"><input type="radio" name="radio" id="bank" value="bank"><b>Bank</b></label>
                  <label class="radio-inline"><input type="radio" name="radio" id="bkash" value="bkash"> <b>Bkash</b></label>
                  <label class="radio-inline"> <input type="radio" name="radio" id="credt_card" value="credtcard"> <b>Credit Card</b> </label>

                    <br><br>
                  <a class="pull-right btn btn-sm btn-default" id="ch_bank" style="display: none;"  href=""><b>Checkout With Bank</b></a>
                  <a class="pull-right btn btn-sm btn-default"  id="ch_bkash" style="display:none" href=""><b>Checkout With Bkash</b></a>
                  <a class="pull-right btn btn-sm btn-default" id="ch_credt_card" style="display:none" href=""><b>Checkout With CC</b></a>
             </div>

             <br>
         </div>

     </form>
<br>
</div>

@stop

