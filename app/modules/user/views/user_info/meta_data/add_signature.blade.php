
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Signature</h4>
</div>
<div class="modal-body">
   {{Form::model($model, array('route'=>['user/meta-data/add-signature',$model->id],'class'=>'form-horizontal','files'=>true))}}

    <br><br>
    {{ Form::label('signature', 'Select One :') }}
    {{ Form::file('signature',array('multiple'=>true)) }}

    <p>&nbsp;</p>
    {{ Form::submit('ADD', array('class'=>'pull-right btn btn-primary')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    {{Form::close()}}
    <p>&nbsp;</p>
</div>










