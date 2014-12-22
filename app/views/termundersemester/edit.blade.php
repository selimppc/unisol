<div class="modal-header">
 	<h4 class="modal-title">Edit Years</h4>
</div>
<div class="modal-body">

    <div style="padding: 10px; width: 90%;">

        {{ Form::model($datas,array('url'=> array('term/update',$datas->id), 'method' => 'POST')) }}

            @include('termundersemester._form')

        {{ Form::close() }}

    </div>
</div>

<div class="modal-footer">
    <a href="{{URL::to('term/show')}}" class="btn btn-default">Close </a>
</div>
