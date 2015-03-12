<div style="padding: 10px; width: 90%;">
        <h2>Edit Subject Management : <strong></strong></h2>

            {{ Form::model($edit_subject_management,array('url'=> array('admission_test/amw/update_subject_management',$edit_subject_management->id), 'method' => 'POST')) }}
                         @include('admission::amw/admission_test/_adm_admission_subject_form')
            {{ Form::close() }}
</div>