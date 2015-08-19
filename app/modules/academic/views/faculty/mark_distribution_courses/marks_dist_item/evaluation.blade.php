<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large">Marks of
        {{isset($item_title->relAcmAcademic->title) ? $item_title->relAcmAcademic->title: ''}}</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        <p>Title : Marks of {{isset($item_title->relAcmAcademic->title) ? $item_title->relAcmAcademic->title: ''}} of {{isset($item_title->relUser->relUserProfile->last_name) ? $item_title->relUser->relUserProfile->last_name : ''}} </p>
        <p><strong>Exam is Not Taken Yet.So No Evaluation Marks To Show.</strong></p>
        {{--<p>Marks: {{$marks->marks}}</p>--}}
        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>