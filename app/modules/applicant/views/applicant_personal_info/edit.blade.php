<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Edit Personal info</h4>
</div>
<div class="modal-body">
    <div class="row" style="padding: 4%">

    {{ Form::model($applicant_personal_info,array('url'=> array('apt/personal_info/update/'.$applicant_personal_info->id), 'method' => 'POST','class'=>'form-horizontal','files'=>true)) }}
    @include('applicant::applicant_personal_info._form')
    {{ Form::close() }}
    </div>
</div>