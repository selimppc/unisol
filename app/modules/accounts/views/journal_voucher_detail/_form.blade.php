<style>
    input{
        border-color: 1px solid #efefef;
    }
    #test input {
        border: none;
        width: 99%;
    }
</style>
<div class='form-group'>
   {{ Form::label('coa', 'Chart Of Accounts') }} ( <small>Search Account by Typing Account Code or Account Name</small> )
   {{ Form::text('coa',  '', ['id'=>'search-coa', 'class'=>'ui-autocomplete form-control', 'placeholder'=>'search account ..', 'autofocus' ]) }}
</div>
{{Form::hidden('coa_id', null,['id'=>'coa-id'])}}
{{Form::hidden('coa_code', null,['id'=>'coa-code'])}}
{{Form::hidden('coa_name', null,['id'=>'coa-name'])}}

<div class='row'>
    <div class="col-sm-4">
        <div class='form-group'>
            {{ Form::label('debit_credit', 'Debit / Credit Amount') }}
               {{ Form::text('debit_credit', Input::old('debit_credit'),['id'=>'debit-credit-amount']) }}
        </div>
    </div>
    <div class="col-sm-4">
        <div class='form-group'>
           {{ Form::label('coa_note', 'Note') }}
           {{ Form::textarea('coa_note', Input::old('coa-note'),['id'=>'coa-note', 'size' => '30x1']) }}
        </div>
    </div>
    <div class="col-sm-4" style="padding: 4%">
        <input type="button" class="pull-right btn-xs btn-linkedin" id="add-new-product" value="+ Product">
    </div>
</div>

@include('accounts::journal_voucher_detail._script')

<p>
    <b> Voucher Detail(s)</b>
    <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
</p>
<table class="table table-bordered small-header-table" id="amwCourseConfig">
    <thead>
    <th> Account Name (Code) </th>
    <th> Prime Amount </th>
    <th> note </th>
    <th> Action </th>
    </thead>

        {{Form::hidden('acc_voucher_head_id', $jv_head->id)}}
    <tbody id="test">
    </tbody>

    <tbody>
    <?php $counter = 0;?>
    @foreach($jv_dt as $key => $value)
        <tr>
            <td>{{$value->relAccChartOfAccounts->description}} ({{$value->relAccChartOfAccounts->account_code}})  </td>
            <td>{{round($value->prime_amount, 2)}}</td>
            <td>{{ $value->note }}</td>
            <td>
                <a data-href="{{ $value->id }}" class="btn btn-default btn-sm delete-dt" id="delete-dt{{ $value->id }}" ><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a>

            </td>
        </tr>
   @endforeach

</table>

{{ Form::submit('Submit', ['class'=>'pull-right btn btn-xs btn-success', 'style'=>'padding: 1%;'] ) }}
{{--{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}--}}
{{--<a href="" class="pull-left btn btn-default" style="margin-right: 5px">Close</a>--}}


<p>&nbsp;</p>


{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}