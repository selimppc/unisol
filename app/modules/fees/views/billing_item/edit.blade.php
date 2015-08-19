<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit Item :: {{isset($edit_item->title) ? $edit_item->title :''}} Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">

        {{Form::model($edit_item, array('route' => array('billing.item.update', $edit_item->id)))}}

        <div class='form-group'>
            <div>{{ Form::label('title', 'Title') }}</div>
            <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('description', 'Description') }}</div>
            <div>{{ Form::textarea('description', Input::old('description'),[
    'onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",
    'class'=>'form-control input-sm','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('initial', 'Initial') }}</div>
            <div>{{ Form::select('initial',array('' => 'Select One','adm' => 'adm', 'acm' => 'acm','aacm'=>'aacm'),$edit_item->initial,['class'=>'form-control']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('is_unit_qty', 'Is Unit Qty') }}</div>
            <div>{{ Form::text('is_unit_qty', Input::old('is_unit_qty'),['class'=>'form-control']) }}
            </div>
        </div>

        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>' btn btn-success')) }}
            <button class=" btn btn-default" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>
