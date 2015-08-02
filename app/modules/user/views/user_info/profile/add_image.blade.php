<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Profile Picture</h4>
</div>
<div class="modal-body">
   {{Form::model($model, array('route'=>['user/profile-info/add/profile-image',$model->id],'class'=>'form-horizontal','files'=>true))}}

    <br><br>
    {{ Form::label('image', 'Select One :') }}
    {{ Form::file('image',array('multiple'=>true)) }}

    <p>&nbsp;</p>
    {{ Form::submit('ADD', array('class'=>'pull-right btn btn-primary')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    {{Form::close()}}
    <p>&nbsp;</p>
</div>










