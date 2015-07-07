<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title">Create Billing Details Applicant</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        {{Form::open(array('route' => array('billing.details.applicant.save')))}}

        {{ Form::text('billing_summary_applicant_id', $data, ['class'=>'form-control'])}}

        <div class="col-sm-3">
        <div class="form-group">
            {{ Form::label('billing_item_id', 'Item') }}
            {{ Form::select('billing_item_id', $item, Input::old('billing_item_id'), ['class' => 'form-control','required'=>'required']) }}
        </div>
        </div>
        <div class="col-sm-2">
        <div class="form-group">
            {{ Form::label('waiver_id', 'Waiver') }}
            {{ Form::select('waiver_id', $waiver, Input::old('waiver_id'), ['class' => 'form-control','required'=>'required']) }}
        </div>
        </div>
        <div class="col-sm-2">
        <div class='form-group'>
            <div>{{ Form::label('waiver_amount', 'Waiver Amount') }}</div>
            <div>{{ Form::text('waiver_amount', Input::old('waiver_amount'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>
        </div>
        <div class="col-sm-2">
        <div class='form-group'>
            <div>{{ Form::label('cost_per_unit', 'Cost Per Unit') }}</div>
            <div>{{ Form::text('cost_per_unit', Input::old('cost_per_unit'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>
        </div>
        <div class="col-sm-1">
        <div class='form-group'>
            <div>{{ Form::label('quantity', 'Quentity') }}</div>
            <div>{{ Form::text('quantity', Input::old('quantity'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>
        </div>
        <div class="col-sm-2">
        <div class='form-group'>
            <div>{{ Form::label('total_amount', 'Total Amount') }}</div>
            <div>{{ Form::text('total_amount', Input::old('total_amount'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>
        </div>
        <div class="col-sm-2">
            <div class='form-group'>
                <input type="button" class=" btn btn-primary"  value="+Add">
            </div>
        </div>


        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>

        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>' btn btn-success')) }}
            <button class=" btn btn-default" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>




