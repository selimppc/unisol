<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit Item :: {{isset($edit_schedule->title) ? $edit_schedule->title :''}} Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">

        {{Form::model($edit_schedule, array('route' => array('billing.schedule.update', $edit_schedule->id)))}}

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

        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
            <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>
