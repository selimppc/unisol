<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Certificate</h4>
</div>

<div class="modal-body">
    @if(isset($model))
        <div class="etsb-image-doc">{{ $model->certificate != null ? HTML::image('/uploads/user_images/docs/'.$model->certificate) :'' }}</div>
    @endif
    <p>&nbsp;</p>
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    <p>&nbsp;</p>
</div>
