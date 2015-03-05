<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">CT Comments</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">

        <div class="jumbotron text-left" style="padding-top: 2px; padding-left: 2px; padding-bottom: 5px; background-color: #FFEBE6;">
            @foreach($comments_info as $comments_info)
                <strong>Comments:</strong><h4> {{ $comments_info->comments }}</h4>
                <strong>By:</strong>
                <h4> {{ $comments_info->commented_by }}</h4>
                <br>
            @endforeach
        </div>

        {{ Form::open(array('url' => array('comments/save'), 'method' =>'post'))  }}

        {{--{{ Form::text('assign_stu_user_id', $assign_std->user_id, ['class'=>'form-control assign_stu_user_id'])}}--}}

        <div class='form-group'>
            {{ Form::label('comments', 'CT Comments') }}
            {{ Form::textarea('comments', Input::old('comments'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}
        </div>

        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
            <a href="{{URL::previous()}}" class="btn btn-default">Close</a>
        </div>
        {{ Form::close() }}
    </div>
</div>
