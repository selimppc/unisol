<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
 <h4 class="modal-title">Edit Years</h4>
</div>
<div class="modal-body">

    <div style="padding: 10px; width: 90%;">

        {{ Form::model($years,array('url'=> array('years/update',$years->id), 'method' => 'POST')) }}

            @include('years._form')

        {{ Form::close() }}

    </div>
</div>

<div class="modal-footer">
    <a href="{{URL::to('years/show')}}" class="btn btn-default">Close </a>
</div>
