<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3>Update Salary Deduction</h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">

        {{Form::model($model, ['route'=> ['edit-salary-deduction', $model->id], 'method' => 'patch', 'role' => 'form', 'files' => true,])}}
                {{ Form::hidden('id', $model->id) }}
                @include('hr::hr.salary_deduction._form')
        {{ Form::close() }}

    </div>
</div>
