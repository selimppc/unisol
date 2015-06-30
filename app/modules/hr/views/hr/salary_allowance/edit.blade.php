<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3>Update Salary Allowance :
{{--     <strong style="color: #002a80">{{ $model->relHrEmployee->relUser->relUserProfile->first_name .' '.$model->relHrEmployee->relUser->relUserProfile->middle_name.' '.$model->relHrEmployee->relUser->relUserProfile->last_name }}</strong>--}}
      </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">

        {{Form::model($model, ['route'=> ['salary_allowance.edit', $model->id], 'method' => 'patch', 'role' => 'form', 'files' => true,])}}
                {{ Form::hidden('id', $model->id) }}
                @include('hr::hr.salary_allowance._form')
        {{ Form::close() }}

    </div>
</div>
