
<!-- Modal for Edit -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit </h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Show Modal -->
<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Show Semester</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" >Cencel</button>
      </div>
    </div>
  </div>
</div>
<!-- View Question Items Modal -->
<div class="modal fade" id="ViewQuestionItems" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
{{--<!-- Modal for delete -->--}}
<div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>
            </div>
        </div>
    </div>
</div>
{{--New Modification start from here--}}
<!-- Modal for Create -->
<div class="modal fade" id="AddExamination" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Examination</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array('url' => 'examination/amw/storeExamination', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
                        @include('examination::amw/prepare_question_paper/_addExamination_form')
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!--modal for add examiner-->
<div class="modal fade" id="AddExaminer" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Examiner</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(array('url' => 'examination/amw/storeExaminers', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
                        @include('examination::amw/prepare_question_paper/_addExaminer_form')
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- View Examination Modal -->
<div class="modal fade" id="ViewExamination" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
         ! Hi ! View Examination
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- Edit Examinationn Modal -->
<div class="modal fade" id="EditExamination" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        ! Hi ! Edit Examination
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<!-- View Examiner Modal -->
<div class="modal fade" id="ViewExaminer" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        ! Hi ! View Examinern
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


<!-- View Questions Modal-->
<div class="modal fade" id="View_QuestionS" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>