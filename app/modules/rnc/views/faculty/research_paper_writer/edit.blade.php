<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center">Edit Writer for : <b style="color: darkblue">{{ $rnc_r_p_writer_edit->relRnCResearchPaper->title }}</b></h4>
</div>
<div class="modal-body">
        {{Form::model($rnc_r_p_writer_edit, array('route' => array('faculty.research-paper-writer.update', $rnc_r_p_writer_edit->id), 'method' => 'POST'))}}
        {{Form::hidden('id', $rnc_r_p_writer_edit->id )}}
        {{Form::hidden('rnc_research_paper_id', $rnc_r_p_writer_edit->rnc_research_paper_id )}}

        <div class="form-group">
            <div>{{ Form::label('writer_user_id', 'Writer Name') }}</div>
            <div>{{ Form::select('writer_user_id',$list_writer_name , $rnc_r_p_writer_edit->writer_user_id ,['class'=>'form-control','required']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('note', 'Note') }}</div>
            <div>{{ Form::text('note', Input::old('note'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>

            {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
            <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>

        {{ Form::close() }}

</div>

