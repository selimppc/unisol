<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large">Edit ::
        {{isset($item_title->title) ? $item_title->title :''}}
    </h4>
</div>
<div class="modal-body edit_modal_aca">
    <div style="padding: 10px">

        {{ Form::model($edit_data,array('route'=> array('class/update',$edit_data->id), 'method' => 'POST', 'files' => true)) }}
        <div class='form-group'>
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x5']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('class_schedule', 'Date') }}
            {{ Form::select('class_schedule',$date_time,($edit_data->acm_class_schedule_id) ? $edit_data->acm_class_schedule_id : Input::old('class_schedule'),['class'=>'form-control','required']) }}
        </div>
        <div class="well">
            @foreach($datas as $rkey => $value)
                {{--{{ HTML::image('file/item_class_file/'.$value->file, $value->file,['class'=>'col-md-4'])}}--}}
                <p>
                    {{$value->file}}
                    <a class="btn btn-default btn-sm pull-right" id="removeId{{$rkey}}" onClick="deleteAcaDetailsImage(this.id, {{$value->id}})"><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a>
                </p>
            @endforeach
        </div>
        <div class='form-group'>
            {{ Form::label('images', 'Upload File') }}
            {{ Form::file('images[]', array('multiple'=>true)) }}
        </div>
        <div class="modal-footer">
            {{--{{ Form::hidden('redirect_url', URL::previous()) }}--}}
            {{--<a href="{{URL::previous()}}" class="btn btn-default btn-xs">Close</a>--}}
            {{ Form::submit('Submit', array('class'=>'btn btn-success btn-xs')) }}
            <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>

