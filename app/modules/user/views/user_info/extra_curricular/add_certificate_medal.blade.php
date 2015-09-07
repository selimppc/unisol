<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Certificate Medal</h4>
</div>
<div class="modal-body">
   {{Form::model($model, array('route'=>['user/extra-curricular/store/certificate-medal',$model->id],'class'=>'form-horizontal','files'=>true))}}

    @if(isset($model))
        <div class="col-lg-4">{{ $model->certificate_medal != null ? HTML::image('/uploads/user_images/docs/'.$model->certificate_medal) :'' }}</div>
        <p>&nbsp;</p>
        {{ Form::label('certificate_medal', 'Select One :') }}
        {{ Form::file('certificate_medal',array('multiple'=>true)) }}
    @else
       {{ Form::label('certificate_medal', 'Select One :') }}
       {{ Form::file('certificate_medal',array('multiple'=>true)) }}
    @endif

    <p>&nbsp;</p>
    {{ Form::submit('ADD', array('class'=>'pull-right btn btn-primary')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    {{Form::close()}}
    <p>&nbsp;</p>
</div>










