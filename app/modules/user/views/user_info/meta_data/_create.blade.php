
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center">Add Biographical Information </h4>
</div>

<div class="modal-body">
     {{ Form::open(array('route' => 'user/meta-data/store','files'=>'true')) }}
          @include('user::user_info.meta_data._form')
     {{ Form::close() }}
 </div>