<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit {{isset($edit_student_head->relUser->relUserProfile->first_name)?$edit_student_head->relUser->relUserProfile->first_name:''}} {{isset($edit_student_head->relUser->relUserProfile->last_name)?$edit_student_head->relUser->relUserProfile->last_name:''}} s Billing Summary </h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">

        {{Form::model($edit_student_head, array('route' => array('billing-student-head.update', $edit_student_head->id)))}}
        @include('fees::billing_summary.student._form')
        {{ Form::close() }}
    </div>
</div>
