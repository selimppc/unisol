<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> Update Tax Rule</b> </h4>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    {{Form::model($model, ['route'=> ['tax_rule.edit', $model->id], 'method' => 'patch', 'role' => 'form', 'files' => true,])}}
            {{ Form::hidden('id', $model->id) }}
            @include('hr::hr.tax_rule._form')
    {{ Form::close() }}

</div>
</div>
