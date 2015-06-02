<div class='form-group'>
    <div>{{ Form::label('rnc_research_paper_id', 'RnC Category') }}</div>
    <div>{{ Form::select('rnc_research_paper_id', [''=>'Select Research Paper' ] + $rnc_research_paper, Input::old('rnc_research_paper_id'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('writer_user_id', 'RnC Publisher') }}</div>
    <div>{{ Form::select('writer_user_id', [''=>'Select Writer' ] + $rnc_writer, Input::old('writer_user_id'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('note', 'Note') }}</div>
    <div>{{ Form::text('note', Input::old('note'),['class'=>'form-control','required'=>'required']) }}</div>
</div>

<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
    <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>