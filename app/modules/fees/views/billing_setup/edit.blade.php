{{ HTML::script('assets/js/custom.js')}}
<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit Billing setup</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        {{Form::model($edit_billing_setup, array('route' => array('billing.setup.update', $edit_billing_setup->id)))}}
        <div class="modal-body">
            <div style="padding: 0px 20px 20px 20px;">
                <div class="row">
                    <div class="help-text-top">
                        <span class="text-danger">  (*) </span>Indicates are required field. Please do not skip these fields.
                    </div>
                </div>
                <div class="form-group">
                    <span class="text-red" >Previous Added Degree</span> : <span class="text-purple">{{isset($degree_program_name->relBatch->relDegree->relDegreeProgram->title) ? $degree_program_name->relBatch->relDegree->relDegreeProgram->title :''}}</span></br>
                    {{ Form::label('degprog_id', 'Degree Name') }}<span class="text-danger">*</span>
                    {{ Form::select('degprog_id',$degree, Input::old('degprog_id'), ['id'=>'batch_name','class'=>'form-control'] ) }}
                </div>
                <div class="form-group">
                    {{ Form::label('batch_id', 'Batch') }}<span class="text-danger">*</span>
                    <span class="loaderClass">{{HTML::image('assets/icon/ajax-loader.gif')}}</span>
                    {{ Form::select('batch_id', $batch_id, Input::old('batch_id'), ['id'=>'dependable-list', 'class'=>'form-control','placeholder'=>'','required'=>'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('schedule_id', 'Schedule') }}<span class="text-danger">*</span>
                    {{ Form::select('schedule_id', $schedule_id,($edit_billing_setup->billing_schedule_id) ? $edit_billing_setup->billing_schedule_id :Input::old('schedule_id'), ['class' => 'form-control','required'=>'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('item_id', 'Item') }}<span class="text-danger">*</span>
                    {{ Form::select('item_id', $item_id,($edit_billing_setup->billing_item_id) ? $edit_billing_setup->billing_item_id :Input::old('item_id'), ['class' => 'form-control','required'=>'required']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('cost', 'Amount') }}<span class="text-danger">*</span>
                    {{ Form::text('cost', Input::old('cost'), array('class' => 'form-control','required'=>'required')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('fined', 'Fined') }}<span class="text-danger">*</span>
                    {{ Form::text('fined',($edit_billing_setup->fined_cost	) ? $edit_billing_setup->fined_cost :'', array('class' => 'form-control','required'=>'required')) }}
                </div>
                <div class='form-group'>
                    {{ Form::label('deadline', 'Deadline') }}
                    {{ Form::text('deadline', Input::old('deadline'),['class'=>'form-control date_picker','required'=>'required']) }}
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Submit', array('class'=>' btn btn-success')) }}
                    <button class=" btn btn-default" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>

        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
</div>

{{----------------Ajax operation: depandable dropdown  ----------------------------------}}
<script>
    $(function(){
        $('.loaderClass').hide();
        $('#batch_name').change(function(){
            $('.loaderClass').show();
            $.get("{{ url('fees/billing/drop-down-batch')}}",
                    { degree: $(this).val() },
                    function(data) {
                        $('.loaderClass').hide();
                        var model = $('#dependable-list');
                        model.empty();
                        $.each(data, function(key, element) {
                            model.append("<option value='"+ key +"'>" + element + "</option>");
                        });
                    });
        });
    });

</script>

