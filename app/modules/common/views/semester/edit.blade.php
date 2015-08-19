<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Edit Semester</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        {{ Form::model($term_semester,array('url'=> array('semester/update',$term_semester->id), 'method' => 'POST')) }}
        @include('common::semester._form')
        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
</div>


