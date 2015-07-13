<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="text-center text-purple">Create Billing Details Applicant</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        {{ Form::hidden('billing_applicant_head_id', $billing_head_id, ['class'=>'form-control'])}}
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::label('billing_item_id', 'Item') }}
                {{ Form::select('billing_item_id', $item, Input::old('billing_item_id'), ['class' => 'form-control','id'=>'billing_item_id','required'=>'required']) }}
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                {{ Form::label('waiver_id', 'Waiver') }}
                {{ Form::select('waiver_id', $waiver, Input::old('waiver_id'), ['class' => 'form-control','id'=>'waiver_id','required'=>'required']) }}
            </div>
        </div>
        <div class="col-sm-2">
            <div class='form-group'>
                <div>{{ Form::label('waiver_amount', 'Waiver Amount') }}</div>
                <div>{{ Form::text('waiver_amount', Input::old('waiver_amount'),['class'=>'form-control','id'=>'waiver_amount','required'=>'required']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class='form-group'>
                <div>{{ Form::label('cost_per_unit', 'Cost Per Unit') }}</div>
                <div>{{ Form::text('cost_per_unit', Input::old('cost_per_unit'),['class'=>'form-control','id'=>'cost_per_unit','required'=>'required']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-1">
            <div class='form-group'>
                <div>{{ Form::label('quantity', 'Quentity') }}</div>
                <div>{{ Form::text('quantity', Input::old('quantity'),['class'=>'form-control','id'=>'quantity','required'=>'required']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class='form-group'>
                <div>{{ Form::label('total_amount', 'Total Amount') }}</div>
                <div>{{ Form::text('total_amount', Input::old('total_amount'),['class'=>'form-control','id'=>'total_amount','required'=>'required']) }}
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class='form-group'>
                <input type="button" class="btn btn-primary" id="add_billing_applicant_detail" value="+Add">
            </div>
        </div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
    </div>

<div class="table-hide">
    <p>
		<span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold">
		</span>
    </p>
    {{Form::open(array('route' => array('billing.details.applicant.save')))}}
    <table class="table table-bordered small-header-table" id="amwCourseConfig">
        <thead>
        <th>Billing Item</th>
        <th>waiver</th>
        <th>Waiver Amount</th>
        <th>Cost Per Unit</th>
        <th>Quantity</th>
        <th>Total Amount</th>
        <th width="100px">Action</th>
        </thead>

        <tbody id="item">

        </tbody>

        <tbody>
        @foreach ($billing_details_data as $value)
            <tr>
                <td>{{isset($value->relBillingItem->title)?$value->relBillingItem->title:''}}</td>

                 <td>{{isset($value->relWaiver->title)? $value->relWaiver->title:'0'}}</td>

                <td>{{isset($value->relWaiver->amount)? $value->relWaiver->amount:'0'}}</td>

                <td>{{isset($value->cost_per_unit)? $value->cost_per_unit:''}}</td>

                <td>{{isset($value->quantity)? $value->quantity:''}}</td>

                <td>{{isset($value->total_amount)? $value->total_amount  :''}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        {{ Form::submit('Save', ['class'=>'btn btn-success']) }}
        <button class="btn btn-default " data-dismiss="modal" type="button">Close</button>
    </div>
    {{ Form::close() }}
</div>
</div>
<p>&nbsp;</p>

@include('fees::billing_summary.applicant._script')






