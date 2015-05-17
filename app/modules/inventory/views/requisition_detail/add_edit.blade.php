
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> Product list of Requisition No:  <b>{{$req_head->requisition_no}}</b> </h4>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body" >

{{--    {{Form::model($model, ['route'=> ['detail-requisition', $model->id], 'method' => 'patch', 'role' => 'form', 'files' => true,])}}--}}
{{--            {{ Form::hidden('id', $model->id) }}--}}
            @include('inventory::requisition_detail._form')
{{--    {{ Form::close() }}--}}

</div>
</div>

{{--
<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>--}}

