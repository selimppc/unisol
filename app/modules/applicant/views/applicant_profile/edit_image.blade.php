<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Profile Picture</h4>
</div>
<div class="modal-body">
    {{ Form::model($profile,array('url'=> array('applicant/profile_image/update/'.$profile->id), 'method' => 'POST','class'=>'form-horizontal','files'=>true)) }}

    {{ Form::label('profile_image', 'Picture:') }}<br>
    {{ HTML::image('/applicant_images/profile/'.$profile->profile_image, $profile->profile_image,['class'=>'col-md-3'])}}
    <br><br>
    {{ Form::label('profile_image', 'Select Profile Picture :') }}
    {{ Form::file('profile_image',array('multiple'=>true)) }}

    <p>&nbsp;</p>
    {{ Form::submit('Change Picture', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::to('applicant/profile/')}}" class="btn btn-default">Close </a>
    {{Form::close()}}
</div>
<div class="modal-footer">
</div>









