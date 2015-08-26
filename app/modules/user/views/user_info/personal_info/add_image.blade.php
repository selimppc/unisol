<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Profile Picture</h4>
</div>
<div class="modal-body">
   {{Form::model($model, array('route'=>['user/profile-info/add/profile-image',$model->id],'class'=>'form-horizontal','files'=>true))}}

    @if(isset($model))
        <div class="col-lg-3">{{ $model->image != null ? HTML::image('/uploads/user_images/profile/'.$model->image) :'' }}</div>
        <p>&nbsp;</p>
        {{ Form::label('image', 'Select Profile Picture :') }}
        {{ Form::file('image',array('multiple'=>true)) }}
    @else
       {{ Form::label('image', 'Select Profile Picture :') }}
       {{ Form::file('image',array('multiple'=>true)) }}
    @endif
    <p>&nbsp;</p>
    <div>
        {{ Form::submit('ADD', array('class'=>'pull-right btn btn-primary')) }}
        <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    </div>
    <p>&nbsp;</p>
    {{Form::close()}}

</div>










