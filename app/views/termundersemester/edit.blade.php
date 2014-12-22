    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit info</h4>
    </div>
    <div class="modal-body">
        <div style="padding: 10px; width: 90%;">

            {{ Form::model($terms,array('route'=> array('term/update',$terms->id), 'method' => 'POST', 'class'=>'form-horizontal')) }}

                @include('termundersemester._form')

            {{ Form::close() }}

        </div>
    </div>
    <div class="modal-footer">
       <a href="{{URL::to('term/show')}}" class="btn btn-default">Close </a>
    </div>