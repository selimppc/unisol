<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Transcript</h4>
</div>

<div class="modal-body">
    @if(isset($model))
        <div class="etsb-image-doc">{{ $model->transcript != null ? HTML::image('/uploads/user_images/docs/'.$model->transcript) :'' }}</div>
    @endif
    <p>&nbsp;</p>
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    <p>&nbsp;</p>
</div>
