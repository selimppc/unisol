<div class="modal-header">
<?php
    $doc_type_arr = array(
        'academic_goal_statement' => 'Academic Goal Statement',
        'essay' => 'Essay',
        'letter_of_intent' => 'Letter of Intent',
        'personal_statement' => 'Personal Statement',
        'research_statement' => 'Research Statement',
        'portfolio' => 'Portfolio',
        'writing_sample' => 'writing_sample',
        'resume' => 'Resume',
        'readmission_personal_details' => 'Re-admission Personal Details',
        'other'=>'Other',
    )
?>
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">View : {{ $doc_type_arr[$doc_type] }}</h4>
</div>
<div class="modal-body">
   hello
</div>










