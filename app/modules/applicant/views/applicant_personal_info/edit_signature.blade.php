<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Signature</h4>
</div>
<div class="modal-body">
    {{ Form::model($signature,array('url'=> array('applicant/personal_info_signature/update/'.$signature->id), 'method' => 'POST','class'=>'form-horizontal','files'=>true)) }}

    {{ Form::label('profile_image', 'Picture:') }}<br>
    {{ HTML::image('/applicant_images/app_meta/'.$signature->signature, $signature->signature,['class'=>'col-md-3'])}}
    <br><br>
    {{ Form::label('signature', 'Select Signature ') }}
    {{ Form::file('signature',array('multiple'=>true)) }}

    <p>&nbsp;</p>
    {{ Form::submit('Change Signature', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::to('apt/personal_info/')}}" class="btn btn-default">Close </a>
    {{Form::close()}}
</div>
<div class="modal-footer">
</div>









