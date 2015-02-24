<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Edit class</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">

        {{ Form::model($edit_data,array('url'=> array('class/update',$edit_data->id), 'method' => 'POST')) }}
        <div class='form-group'>
            {{ Form::label('title', 'Class Title') }}
            {{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('class_time', 'Class Time') }}
            {{ Form::select('class_time',$date_time,($edit_data->acm_class_schedule_id) ? $edit_data->acm_class_schedule_id : Input::old('class_time'),['class'=>'form-control','required']) }}
        </div>
        @foreach($datas as $value)
            {{--{{ HTML::image('file/item_class_file/'.$value->file, $value->file,['class'=>'col-md-4'])}}--}}
            <br> {{ Form::label('images', $value->file) }}
        @endforeach
        <div class='form-group'>
            {{ Form::label('images', 'Upload File') }}
            {{ Form::file('images[]', array('multiple'=>true)) }}
        </div>
        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
            <a href="{{URL::previous('academic/faculty/marksdistitem/class/')}}" class="btn btn-default">Close</a>
        </div>
        {{ Form::close() }}
    </div>
</div>
{{--class ajax delete in popup--}}
