{{Form::open(['route'=>'store-applicant-ar-voucher', 'files'=>true, 'id'=>'grn-sub-grn-data'])}}
<style type="text/css">
    .unpaid-items tr:hover{
        cursor: pointer;
        background-color: #2f96b4;
    }
</style>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> Payment for the Supplier # {{ $associated_id }}  </h4>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body " >

<div id="response-msg" style="color: green; font-size: 16px;"></div>
<div id="response-msg-failed" style="color: red; font-size: 16px;"></div>
<div class='row' id="refresh_area" >
    <div class="col-sm-5" style="border: 1px solid #003bb3;  ">
        <h4> Payment Information #  </h4>

        <div class='form-group'>
           {{ Form::hidden('voucher_number', Input::old('voucher_number'), ['class'=>'form-control' , 'required']) }}
        </div>
        <div class='form-group'>
           {{ Form::label('date', 'Date') }}
           {{ Form::text('date', Input::old('date'),['class'=>'form-control date_picker', 'required']) }}

        </div>
        <div class='form-group'>
           {{ Form::label('year_id', 'Year') }}
           {{ Form::select('year_id', $year_lists, Input::old('year_id'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('period', 'Period') }}
           {{ Form::select('period', $period_lists, Input::old('period'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('acc_chart_of_accounts_id', 'Account Name (Credit)') }}
           {{ Form::select('acc_chart_of_accounts_id', $coa_lists, Input::old('acc_chart_of_accounts_id'),['class'=>'form-control', 'required']) }}
        </div>
        <div class='form-group'>
           {{ Form::hidden('associated_id', $associated_id) }}
        </div>

        <div class='form-group'>
           {{ Form::label('amount', 'Amount for PAY') }}
           <br>(Remaining Balance is:  <input name="pay_amount" id="pay-for-amount" readonly style="border: none; color: orangered; width: 100px; font-weight: bold;"> )
           {{ Form::text('amount', Input::old('amount'),['class'=>'form-control', 'required', 'id'=>'amount-for-pay', 'placeholder'=>'0.00']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('expense_account', 'Expense Account (Debit)') }}
           {{ Form::select('expense_account',$coa_lists, Input::old('expense_account'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('note', 'Note') }}
           {{ Form::textarea('note', Input::old('note'),['class'=>'form-control', 'size' => '30x2', 'required']) }}
        </div>

    </div>

    <div class="col-sm-1">
        &nbsp;
    </div>

    <div class="col-sm-6">
        <div class='row'>
            <div class="col-sm-12" style="background-color: #f9f9f9">
                <h4> Unpaid Invoice of the supplier# {{$associated_id}} </h4>
                <table class="table table-bordered small-header-table" id="amwCourseConfig">
                    <thead>
                        <th>Invoice No</th>
                        <th style="display: none"> Voucher Head ID</th>
                        <th>Amount Payable</th>
                        <th>Date </th>
                    </thead>
                    <tbody class="unpaid-items">
                    @if(isset($unpaid_invoice))
                    @foreach($unpaid_invoice as $key => $value)
                        <tr>
                            <td> {{ $value->relAccVoucherHead->voucher_number }} </td>
                            <td style="display: none"> {{ $value->acc_voucher_head_id }} </td>
                            <td><b>{{ $value->prime_amount }}</b></td>
                            <td>{{ $value->date }}</td>
                        </tr>
                   @endforeach
                   @endif
                </table>
            </div>

            <p> &nbsp; </p>

            <div class="col-sm-12" style="background-color: #f9f9f9">
                <h4> Allocated Invoice </h4> <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
                <table class="table table-bordered small-header-table" id="amwCourseConfig">
                    <thead>
                        <th> Invoice NO  </th>
                        <th> Amount </th>
                    </thead>
                    <tbody id="new-data"></tbody>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div class='form-group'>
           {{ Form::label('total_amount', 'Total') }}
           <input name="total_amount" class="form-control" id="allocation-total-amount" value="0.00" readonly >
        </div>

        <div class="form-group">
            {{ Form::submit('Submit', ['class'=>'pull-right btn btn-xs btn-success', 'id'=>'submit-button-form', 'style'=>'padding: 1%;'] ) }}
        </div>

    </div>
</div>
<p>&nbsp;</p>

</div>
</div>
{{ Form::close() }}




@include('payment::applicant._script')
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}
{{--{{ HTML::script('assets/js/custom.js')}}--}}
{{ HTML::script('assets/etsb/etsb_js/etsb_custom.js')}}
{{--{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}--}}


