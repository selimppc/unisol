<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title"style="text-align: center ;color: #800080">Edit Class Test</h4>
</div>
<div class="modal-body edit_modal_aca">
    <div style="padding: 10px; width: 90%;">

        {{ Form::model($edit_data,array('route'=> array('class_test/update',$edit_data->id), 'method' => 'POST', 'files' => true)) }}
        <div class='form-group'>
            {{ Form::label('title', 'Class Title') }}
            {{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x5']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('class_time', 'Class Time') }}
            {{ Form::select('class_time',$date_time,($edit_data->acm_class_schedule_id) ? $edit_data->acm_class_schedule_id : Input::old('class_time'),['class'=>'form-control','required']) }}
        </div>
        <div class="well">
            @foreach($datas as $rkey => $value)
                {{--{{ HTML::image('file/item_class_file/'.$value->file, $value->file,['class'=>'col-md-4'])}}--}}
                <p>
                    {{$value->file}}
                    <a class="btn btn-default btn-sm pull-right" id="removeId{{$rkey}}" onClick="deleteAcaDetailsImageCT(this.id, {{$value->id}})"><span class="glyphicon glyphicon-trash text-danger"></span></a>
                </p>
            @endforeach
        </div>
        <div class='form-group'>
            {{ Form::label('images', 'Upload File') }}
            {{ Form::file('images[]', array('multiple'=>true)) }}
        </div>
        <div class="modal-footer">
            {{ Form::hidden('redirect_url', URL::previous()) }}
            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
            <a href="{{URL::previous('academic/faculty/marks/dist/item/class_test/')}}" class="btn btn-default">Close</a>
        </div>
        {{ Form::close() }}
    </div>
</div>

