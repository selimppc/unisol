<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit Author :: {{isset($edit_author->name) ? $edit_author->name :''}} Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        {{Form::model($edit_author, array('route' => array('author.update', $edit_author->id)))}}
        <div class='form-group'>
            <div>{{ Form::label('name', 'Name') }}</div>
            <div>{{ Form::text('name', Input::old('name'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('email', 'Email') }}</div>
            <div>{{ Form::text('email', Input::old('email'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('phone', 'Phone') }}</div>
            <div>{{ Form::text('phone', Input::old('phone'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('address', 'Address') }}</div>
            <div>{{ Form::textarea('address', Input::old('address'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'20x4']) }}</div>

        </div>

        <div class='form-group'>
            <div>{{ Form::label('country', 'Country') }}</div>
            <div>{{ Form::select('country_id', [''=>'Select Country' ] + $country, Input::old('country_id'), array('class' => 'form-control') ) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('note', 'Note') }}</div>
            <div>{{ Form::textarea('note', Input::old('note'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'20x4']) }}
            </div>
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