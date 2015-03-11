<div class="modal fade" id="AddSubjectToDegree" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Manage Admission Test Subject : Add</h4>
            </div>

            <div class="modal-body">
                {{ Form::open(array('route' => 'admission_test.amw.store_admtest_subject', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
{{--                        {{ Form::text('adm_examiners_home', $adm_examiners_home ) }}--}}
                        @include('admission::amw.admission_test._add_adm_test_subject_to_degree_form')
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>