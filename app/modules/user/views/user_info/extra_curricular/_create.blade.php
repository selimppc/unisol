
 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center">Add Extra Curricular Activities</h4>
 </div>

 <div class="modal-body">
     {{ Form::open(array('route' => 'user/extra-curricular/store','files'=>'true')) }}
          @include('user::user_info.extra_curricular._form')
     {{ Form::close() }}
 </div>