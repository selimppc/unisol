<div class="modal-header">
 	<h4 class="modal-title">Edit Years</h4>
</div>
<div class="modal-body">

    <div style="padding: 10px; width: 90%;">

        {{ Form::model($years,array('url'=> array('year/update',$years->id), 'method' => 'POST')) }}

            @include('year._form')

        {{ Form::close() }}

    </div>
</div>

<div class="modal-footer">
    <a href="{{URL::to('year/show')}}" class="btn btn-default">Close </a>
</div>
