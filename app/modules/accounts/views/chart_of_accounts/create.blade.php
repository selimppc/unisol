<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> New Requisition </h4>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body" >
    {{Form::open(['route'=> ['requisition-store'], 'method' => 'patch', 'role' => 'form', 'files' => true,])}}
            @include('inventory::requisition_head._form')
    {{ Form::close() }}

</div>
</div>

{{--
<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>--}}
