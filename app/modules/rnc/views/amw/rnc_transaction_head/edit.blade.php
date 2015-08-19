<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3>Update RNC Transaction </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        {{Form::model($model, ['route'=> ['amw.transaction-head.edit', $model->id], 'method' => 'patch', 'role' => 'form', 'files' => true,])}}
                {{ Form::hidden('id', $model->id) }}

                <div class='form-group'>
                   {{ Form::label('user_id', 'User Name') }}
                   {{ Form::select('user_id', $user_list , Input::old('user_id'),['class'=>'form-control', 'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('issue_date', 'Issue Date') }}
                   {{ Form::text('issue_date', Input::old('issue_date'),['class'=>'form-control date_picker','place-holder'=>'ok', 'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('rnc_research_paper_id', 'Research Paper ') }}
                   {{ Form::select('rnc_research_paper_id',$rnc_list ,null,['class'=>'form-control', 'required']) }}
                </div>

                <div class='form-group'>
                   {{ Form::label('status', 'Status') }}
                   {{ Form::select('status',array(''=>'Select Status','open'=>'Open','close'=>'Close','invoiced'=>'Invoiced','confirmed'=>'Confirmed','purchased'=>'Purchased','viewded'=>'Viewded','received'=>'Received'), Input::old('status'),['class'=>'form-control', 'required']) }}
                </div>

                {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
                <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
                </br>

        {{ Form::close() }}
    </div>
</div>


{{ HTML::script('assets/js/custom.js')}}