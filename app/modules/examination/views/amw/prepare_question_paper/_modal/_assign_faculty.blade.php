<div class="modal fade" id="ass_fac" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Assign Facutly</h4>
            </div>
            <div class="modal-body">
                     {{ Form::open(array('url' => 'examination/amw/assign_faculty', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
                            {{ Form::text('exm_exam_list_id', $exam_list_id ) }}
                            @include('examination::amw.prepare_question_paper._assignFaculty_form')
                    {{ Form::close() }}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>