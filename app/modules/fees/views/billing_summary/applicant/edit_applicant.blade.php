<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit {{isset($edit_summary->relApplicant->first_name) ? $edit_summary->relApplicant->first_name:''}}
        {{isset($edit_summary->relApplicant->last_name) ? $edit_summary->relApplicant->last_name:''}}'s Billing Summary </h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">

        {{Form::model($edit_summary, array('route' => array('update-billing-applicant-head', $edit_summary->id)))}}
        @include('fees::billing_summary.applicant._form_applicant')
        {{ Form::close() }}
    </div>
</div>
