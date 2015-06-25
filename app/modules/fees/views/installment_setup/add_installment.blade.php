        {{Form::open(array('route' => array('installment.setup.create')))}}
        <div class="col-sm-12" style="background: #EEEEEE">
            <div class="col-sm-3">
                {{ Form::label('degprog_id', 'Degree Name') }}<span class="text-danger">*</span>
                {{ Form::select('degprog_id',$degree, Input::old('degprog_id'), ['id'=>'batch_name','class'=>'form-control','required'=>'required'] ) }}
            </div>
            <div class="col-sm-3">
                {{ Form::label('batch_id', 'Batch') }}<span class="text-danger">*</span>
                <span class="loaderClass">{{HTML::image('assets/icon/ajax-loader.gif')}}</span>
                {{ Form::select('batch_id', $batch, Input::old('batch_id'), ['id'=>'dependable-list', 'class'=>'form-control','required'=>'required']) }}
            </div>
            <div class="col-sm-2">
                {{ Form::label('schedule_id','Schedule') }}
                <span class="text-danger">*</span>
                {{ Form::select('schedule_id',$schedule, Input::old('schedule_id'), ['class' => 'form-control','required'=>'required','readonly'=>'readonly']) }}

            </div>
            <div class="col-sm-2">
                {{ Form::label('item_id', 'Item') }}<span class="text-danger">*</span>
                {{ Form::select('item_id', $item, Input::old('item_id'), ['class' => 'form-control','required'=>'required','readonly'=>'readonly']) }}
            </div>
            <div class="col-sm-2">
                {{ Form::label('no_installment', 'No of Installment') }}
                {{Form::selectRange('no_installment', 1, 48,'', ['class' => 'form-control','required'=>'required'])}}
            </div>
            <div>&nbsp;</div>
            <div class="col-sm-2 btn-style2">
                {{ Form::submit('Proceed',['class'=>'btn btn-xs btn-success']) }}
                <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
            </div>
            {{ Form::close() }}
        </div>
<div class="modal-footer">

</div>