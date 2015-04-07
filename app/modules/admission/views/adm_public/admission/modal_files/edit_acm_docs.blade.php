
<div class="modal-body">
 {{Form::model($model, array('url'=>'admission/public/admission/update-applicant-acm-docs/'.$model->id, 'class'=>'form-horizontal','files'=>true))}}

    {{ Form::hidden('id', $model->id) }}
    @include('admission::adm_public.admission.modal_files.add_acm_docs')

 {{ Form::close() }}
</div>


