<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit Research Paper Writer</h4>
</div>
<div class="modal-body">
    {{--<div style="padding: 10px;">--}}

        {{Form::model($rnc_r_p_writer_edit, array('route' => array('student.research-paper-writer.update', $rnc_r_p_writer_edit->id), 'method' => 'POST'))}}
        {{Form::hidden('id', $rnc_r_p_writer_edit->id )}}

        <div class='form-group'>
            <div>{{ Form::label('rnc_research_paper_id', 'Research Paper') }}</div>
            <div>{{ Form::text('rnc_research_paper_id', $rnc_r_p_writer_edit->relRnCResearchPaper->title, Input::old('rnc_research_paper_id'),['class'=>'form-control','readonly']) }}</div>
        </div>


        <div class="form-group">
            <div>{{ Form::label('writer_user_id', 'Writer Name') }}</div>
            <div>{{ Form::select('writer_user_id',$list_writer_name , $rnc_r_p_writer_edit->writer_user_id ,['class'=>'form-control','required']) }}</div>
        </div>


        <div class='form-group'>
            <div>{{ Form::label('note', 'Note') }}</div>
            <div>{{ Form::text('note', Input::old('note'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>

        {{--<div class="modal-footer">--}}
            {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
            <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        {{--</div>--}}
        {{ Form::close() }}
    {{--</div>--}}
</div>

