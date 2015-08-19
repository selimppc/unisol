
{{ Form::open(array('class'=>'form-horizontal','route' => 'admission.public.store-applicant-meta', 'method' =>'post', 'files'=>'true')) }}
     @include('admission::adm_public.admission.modal_files.meta_form')

{{ Form::close() }}