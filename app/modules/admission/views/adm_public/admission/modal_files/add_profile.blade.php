
{{ Form::open(array('class'=>'form-horizontal','route' => 'admission.public.store-applicant-profile', 'method' =>'post', 'files'=>'true')) }}
     @include('admission::adm_public.admission.modal_files.profile_form')

{{ Form::close() }}