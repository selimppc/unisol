<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit</h4>
</div>
<div class="modal-body">

    {{ Form::model($applicant_personal_info,array('url'=> array('apt/personal_info/update/'.$applicant_personal_info->id), 'method' => 'POST','class'=>'form-horizontal','files'=>true)) }}
    @include('applicant::applicant_personal_info._form')
    {{ Form::close() }}

</div>