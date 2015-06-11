<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center">Edit Beneficial for : <b style="color: darkblue">{{ $rnc_r_p_beneficial_edit->relRnCResearchPaper->title }}</b></h4>
</div>

<div class="modal-body">
    <div style="padding: 10px;">

        {{Form::model($rnc_r_p_beneficial_edit, array('route' => array('faculty.research-paper-beneficial.update', $rnc_r_p_beneficial_edit->id), 'method' => 'POST'))}}
        {{Form::hidden('id', $rnc_r_p_beneficial_edit->id )}}
        {{Form::hidden('rnc_research_paper_id', $rnc_r_p_beneficial_edit->rnc_research_paper_id )}}

        <div class="form-group">
            <div>{{ Form::label('rnc_research_paper_writer_id', 'Writer Name') }}</div> u={{$rnc_r_p_beneficial_edit->relRnCResearchPaperWriter->writer_user_id .'  '. $rnc_r_p_beneficial_edit->rnc_research_paper_writer_id }}=w
            <div>{{ Form::select('rnc_research_paper_writer_id' ,$list_writer_name , $rnc_r_p_beneficial_edit->relRnCResearchPaperWriter->writer_user_id ,['class'=>'form-control','required']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('value', 'Value') }}</div>
            <div>{{ Form::text('value', Input::old('value'),array('placeholder'=>'Writer Value..','class'=>'form-control','required'=>'required')) }}</div>
        </div>

        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
            <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>

