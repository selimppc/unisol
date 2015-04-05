

 {{Form::model($applicant_meta_records, array('route'=>['admission.public.update-meta-info-applicant',  $applicant_meta_records->id], 'class'=>'form-horizontal','files'=>true))}}

    @include('admission::adm_public.admission.modal_files.meta_form')

 {{ Form::close() }}
