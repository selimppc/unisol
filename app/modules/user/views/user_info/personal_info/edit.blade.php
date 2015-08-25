
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center">Edit </h4>
</div>

<div class="modal-body">

 {{Form::model($model, array('route'=>['user/profile-info/update',$model->id],'class'=>'form-horizontal','files'=>true))}}
 {{--{{Form::model($applicant_personal_info, array('route'=>['admission.public.update-applicant-profile',  $applicant_personal_info->id], 'class'=>'form-horizontal','files'=>true))}}--}}
     @include('user::user_info.personal_info._form')
 {{ Form::close() }}

</div>