<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Or Edit</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
            {{ Form::open(['route' => [''], 'class'=>'form-horizontal','files' => true,]) }}

                {{ Form::select('title',$exm_centers,Input::old('title'),['class'=>'form-control input-sm','required'=>'required']) }}
                {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary')) }}
                <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

                <p>&nbsp;</p>
            {{Form::close()}}
     </div>
</div>

