<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit Book Category :: {{isset($edit_category->title) ? $edit_category->title : '' }}</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        {{Form::model($edit_category, array('route' => array('category.update', $edit_category->id)))}}
        <div class='form-group'>
            <div>{{ Form::label('code', 'Book Code') }}</div>
            <div>{{ Form::text('code', Input::old('code'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
            </div>
        </div>
        <div class='form-group'>
            <div>{{ Form::label('title', 'Book Title') }}</div>
            <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
            </div>
        </div>
        <div class='form-group'>
            <div>{{ Form::label('description', 'Description') }}</div>
            <div>{{ Form::textarea('description', Input::old('description'),[
				'onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",
				'class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10'
				]) }}</div>
        </div>
        <div class='form-group'>
            <div>{{ Form::label('status', 'Status') }}</div>
            <div>{{ Form::select('status',array('' => 'Select One','open' => 'Open', 'close' => 'Close','active'=>'Active','inactive'=>'Inactive'),$edit_category->status,['class'=>'form-control','required'=>'required']) }}</div>
        </div>
        <div>
            {{ Form::submit('Submit', array('class'=>'btn btn-xs btn-success')) }}
            <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
</div>
