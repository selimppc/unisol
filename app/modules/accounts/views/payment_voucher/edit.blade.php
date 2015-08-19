<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> Update:  <b>{{$model->voucher_number}}</b> </h4>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body" >

    {{Form::model($model, ['route'=> ['payment-voucher-edit', $model->id], 'role' => 'form', 'files' => true,])}}
            {{ Form::hidden('id', $model->id) }}
            @include('accounts::payment_voucher._form')
    {{ Form::close() }}

</div>
</div>

{{--
<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>--}}
