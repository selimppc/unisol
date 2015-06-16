<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> Edit Writer and Beneficial list of "<b>{{ $r_p->title }}</b>" Research Paper </h4>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body " >
        {{ Form::model($edit_info, array('route' => array('faculty.research-paper-writer-beneficial.update', $edit_info->id, $ben_id), 'method' => 'POST')) }}
             @include('rnc::faculty.research_paper.r_p_w_f._edit_w_f_form')
        {{ Form::close() }}
    </div>
</div>





