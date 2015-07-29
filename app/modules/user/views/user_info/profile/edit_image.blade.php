<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Profile Picture</h4>
</div>
<div class="modal-body">
   {{Form::model($profile_img, array('route'=>['user/profile-info/change/profile-image',$profile_img->id],'class'=>'form-horizontal','files'=>true))}}

    {{ Form::label('image', 'Profile Picture:') }}<br>
    {{ HTML::image('user_images/profile/'.$profile_img->image, $profile_img->image,['class'=>'col-md-3'])}}
    <br><br>
    {{ Form::label('image', 'Select Another One :') }}
    {{ Form::file('image',array('multiple'=>true)) }}

    <p>&nbsp;</p>
    {{ Form::submit('Change Picture', array('class'=>'pull-right btn btn-primary')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    {{Form::close()}}
    <p>&nbsp;</p>
</div>










