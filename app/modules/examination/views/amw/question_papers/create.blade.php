<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Question Paper</h4>
</div>

  {{Form::open(array('route'=>'amw.question-papers.store', 'method'=>'POST','files'=>true))}}
      {{Form::hidden('exm_exam_list_id', $exm_exam_list_id)}}
      {{Form::hidden('course_conduct_id', $course_conduct_id)}}
      @include('examination::amw.question_papers._form')

  {{ Form::close() }}

