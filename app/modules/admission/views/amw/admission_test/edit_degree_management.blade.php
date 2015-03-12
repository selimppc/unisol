<div style="padding: 10px; width: 90%;">
        <h2>Edit Degree Management : <strong></strong></h2>

            {{ Form::model($edit_degree_management,array('url'=> array('admission_test/amw/update_degree_management',$edit_degree_management->id), 'method' => 'POST')) }}
                         @include('admission::amw/admission_test/_adm_test_degree_form')
            {{ Form::close() }}
</div>