
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center"> Edit Information Of {{isset($model->hr_employee_id)?$model->relHrEmployee->relUser->relUserProfile->first_name.' '.$model->relHrEmployee->relUser->relUserProfile->middle_name.' '.$model->relHrEmployee->relUser->relUserProfile->last_name:''}}</h4>
    <h5 style="text-align: center;color:#0072b1" >Employee ID : {{isset($model->hr_employee_id)?$model->relHrEmployee->employee_id:''}}</h5>
</div>

<div class="modal-body">

 {{Form::model($model, array('route'=>['attendance.update',$model->id,'class'=>'form-control','files'=>true]))}}
     {{ Form::hidden('id', $model->id) }}
     @include('hr::hr.hr_attendance._form')
 {{ Form::close() }}

</div>

