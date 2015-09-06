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
   <div style="padding: 20px;">
       @if($doc_type_arr[$doc_type] == 'Other')
       <table class="table table-striped  table-bordered">
          <tr>
             <td>
                {{isset($supporting_docs->other)?$supporting_docs->other :''}}
             </td>
          </tr>
       </table>
       @else
           <div>
              {{ $supporting_docs->$doc_type != null ? HTML::image('/uploads/user_images/docs/'.$supporting_docs->$doc_type) :'' }}
           </div>
       @endif
       <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
       <p>&nbsp;</p>
   </div>
</div>










