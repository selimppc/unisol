@extends('layouts.layout')
  @section('top_menu')
      @include('layouts._top_menu')
  @stop
  @section('sidebar')
      @include('layouts._sidebar_student')
  @stop
  @section('content')
{{--<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.applicant_details',['batch-applicant-id'=>Auth::applicant()->get()->id])}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>--}}
<h3 class="box-title">Payment</h3>
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

       <div style="margin-left: 40%">
            <a href="{{ URL::route('student.research-paper.index') }}" class="btn btn-info"><b>Home</b></a>
            <a href="{{ URL::previous() }}" class="btn btn-primary"><b>Back</b></a>
            <a href="{{ URL::route('student.research-paper.send-info-to-transaction') }}" class="btn btn-success" ><b><i class="fa fa-mail-forward"></i>  CHECKOUT</b></a>
       </div>


    </div>
 </div>

{{------------------------------------ Modal --------------------------------------------------------------------------}}
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">

        </div>
       </div>
 </div>



@stop

