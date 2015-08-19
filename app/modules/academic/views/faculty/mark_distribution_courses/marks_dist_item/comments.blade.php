<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large">
        {{isset($item_title->relAcmAcademic->title) ? $item_title->relAcmAcademic->title: ''}} :: Comments</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <p><strong>Title :</strong> {{isset($item_title->relAcmAcademic->title) ? $item_title->relAcmAcademic->title: ''}}</p>

        <p ><strong>Conversation with :</strong>
            {{isset($item_title->relUser->relUserProfile->last_name) ? $item_title->relUser->relUserProfile->last_name : ''}}</p>

        <div class="jumbotron text-left" style="padding-top: 2px; background-color: #E3E7EA;">
            @foreach($comments_info as $comments_info)
                <strong>Comments : </strong><h4> {{isset($comments_info->comments) ? $comments_info->comments : ''}}</h4>
                <strong>By : </strong>
                <h4>{{ User::FullName($comments_info->commented_by); }}</h4>
                <h4></h4>
                <br>
            @endforeach
        </div>

        {{ Form::open(array('url' => array('comments/save'), 'method' =>'post'))  }}
        {{ Form::hidden('assign_stu_user_id', (isset($assign_std->id)? $assign_std->id : ''), ['class'=>'form-control assign_stu_user_id'])}}
        <div class='form-group'>
            {{ Form::label('comments', 'Comments') }}
            {{ Form::textarea('comments', Input::old('comments'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}
        </div>
        <div class="modal-footer">
            {{ Form::submit('Submit', ['class'=>'btn btn-xs btn-success saveInMarksDist'] ) }}
            <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>
