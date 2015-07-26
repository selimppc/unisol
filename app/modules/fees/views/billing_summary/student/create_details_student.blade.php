<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="text-center text-purple">Create {{$student_name->relUser->relUserProfile->first_name.' '.$student_name->relUser->relUserProfile->last_name}}'s Billing Details </h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">

<div>&nbsp;</div>
<div>&nbsp;</div>
@include('fees::billing_summary.student._script')





