
{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<div class="modal-body">
    <div style="padding: 0px 20px 20px 20px;">
        <div class="row">
            <div class="help-text-top">
                <span class="text-danger">  (*) </span>Indicates are required field. Please do not skip these fields.

            </div>
        </div>

        <div class="form-group">
            {{ Form::label('degprog_id', 'Degree Name') }}<span class="text-danger">*</span>
            {{ Form::select('degprog_id',$degree, Input::old('degprog_id'), ['id'=>'batch_name','class'=>'form-control','required'=>'required'] ) }}
        </div>
            <div class="form-group">
                {{ Form::label('batch_id', 'Batch') }}<span class="text-danger">*</span>
                {{ Form::select('batch_id', $batch_id, Input::old('batch_id'), ['id'=>'dependable-list', 'class'=>'form-control','placeholder'=>'','required'=>'required']) }}
            </div>

        <div class="form-group">
            {{ Form::label('schedule_id', 'Schedule') }}<span class="text-danger">*</span>
            {{ Form::select('schedule_id', $schedule_id, Input::old('schedule_id'), ['class' => 'form-control','required'=>'required']) }}
        </div>

        <div class="form-group">
            {{ Form::label('item_id', 'Item') }}<span class="text-danger">*</span>
            {{ Form::select('item_id', $item_id, Input::old('item_id'), ['class' => 'form-control','required'=>'required']) }}
        </div>

        <div class="form-group">
            {{ Form::label('amount', 'Amount') }}<span class="text-danger">*</span>
            {{ Form::text('amount', Input::old('amount'), array('class' => 'form-control','required'=>'required')) }}
        </div>

        <div class="form-group">
            {{ Form::label('fined', 'Fined') }}<span class="text-danger">*</span>
            {{ Form::text('fined', Input::old('fined'), array('class' => 'form-control','required'=>'required')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('deadline', 'Deadline') }}
            {{ Form::text('deadline', Input::old('deadline'),['class'=>'form-control date_picker','required'=>'required']) }}
        </div>
        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
            <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        </div>
    </div>
    </div>

    {{----------------Ajax operation: depandable dropdown  ----------------------------------}}
<script>
    $(function(){
        $('#batch_name').change(function(){
            $.get("{{ url('fees/billing/drop-down-batch')}}",
                    { degree: $(this).val() },
                    function(data) {
                        var model = $('#dependable-list');
                        model.empty();
                        $.each(data, function(key, element) {
                            model.append("<option value='"+ key +"'>" + element + "</option>");
                        });
                    });
        });
    });

</script>


