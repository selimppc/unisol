<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center">Change Password </h4>
</div>

<div class="modal-body">
    <div style="padding: 0px 20px 20px 20px;">
         {{Form::model($model, array('route'=>['user/change_password',$model->id],'files'=>true))}}
             {{ Form::label('old_password', 'Old Password') }}
             {{ Form::password('old_password',['class' => 'form-control','placeholder'=>'Enter Old Password','required','id'=>'password-1']) }}

             <div style="color:firebrick" id ="errors"></div>

             {{ Form::label('new_password', 'New Password') }}
             {{ Form::password('new_password',['class' => 'form-control','placeholder'=>'Enter New Password','required','id'=>'password-2','onclick'=>'checkOldPassword()']) }}

             {{ Form::label('confirm_password', 'Confirm Password') }}
             {{ Form::password('confirm_password', ['class' => 'form-control','placeholder'=>'Re-Enter New Password','required']) }}
             <p>&nbsp;</p>
             {{ Form::submit('change Password', array('class'=>'pull-right btn btn-sm btn-primary '))}}
         {{ Form::close() }}
    </div>
    <p>&nbsp;</p>
</div>


{{--<script>
    function checkOldPassword(){
        var password = document.getElementById('old').value;
        //  alert(password);
        if(password){
            alert(password);
        }
    }
</script>--}}
