<div class='form-group'>
    <div>{{ Form::label('rnc_research_paper_id', 'RnC Research Paper') }}</div>
    <div>{{ Form::text('rnc_research_paper_id', $rnc_r_p_id, Input::old('rnc_research_paper_id'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('writer_user_id', 'RnC Writer Name') }}</div>
    <div>{{ Form::text('writer_user_id', $rnc_r_p_writer_user, Input::old('writer_user_id'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('note', 'Note') }}</div>
    <div>{{ Form::text('note', Input::old('note'),['class'=>'form-control','required'=>'required']) }}</div>
</div>

<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
    <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>