<!-- Modal : add goal -->
<div class="modal-header">
<?php
    $doc_type_arr = array(
        'academic_goal_statement' => 'Academic Goal Statement',
        'essay' => 'Essay',
        'letter_of_intent' => 'Letter of Intent',
        'personal_statement' => 'Personal Statement',
        'research_statement' => 'Research Statement',
        'portfolio' => 'Portfolio',
        'resume' => 'Resume',
        'readmission_personal_details' => 'Re-admission Personal Details',
        'other'=>'Other',
    )
?>
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add / Edit : {{ $doc_type_arr[$doc_type] }}</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">
        <h4> </h4>
        {{Form::open(array('url'=>'apt/supporting_docs/store', 'class'=>'form-horizontal','files'=>true))}}
        <div class='form-group'>
            @if($doc_type_arr[$doc_type] == 'Other')
                     <div>{{ Form::label('other', $doc_type_arr[$doc_type]) }}</div>
                     <div>{{ Form::textarea ('other',  $supporting_docs->$doc_type, Input::old($doc_type),['class'=>'form-control']) }}</div>
            @else
                <div>{{ Form::label('Doc Type', $doc_type_arr[$doc_type]) }}</div>
                <div>{{ Form::file('doc_file', Input::old($doc_type),['class'=>'form-control ']) }}</div>
            @endif
            <div>&nbsp;</div>
            @if($supporting_docs->$doc_type != 'Other')
                <div>
                    {{ HTML::image('/applicant_images/supporting_doc/'.$supporting_docs->$doc_type)}}
                </div>
            @endif
        </div>
        <p>&nbsp;</p>
        {{ Form::hidden('id', $supporting_docs->id, ['class'=>'form-control sdoc_id'])}}
        {{ Form::hidden('doc_type', $doc_type, ['class'=>'form-control sdoc_id'])}}
        {{ Form::submit('Save ', array('class'=>'btn btn-primary')) }}
        <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
        {{Form::close()}}
  </div>
</div>
<div class="modal-footer">

</div>


