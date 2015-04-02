
<div class="modal-body">
 {{Form::model($applicant_meta_records, array('route'=>'admission.public.update-applicant-meta',$applicant_meta_records->id, 'class'=>'form-horizontal','files'=>true))}}

    {{ Form::hidden('id', $applicant_meta_records->id) }}
    @include('admission::adm_public.admission.modal_files.add_meta_info')

 {{ Form::close() }}
</div>