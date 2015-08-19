<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Show Semester</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'semester/show','method' => '')) }}
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td>Name:</td>
                <td>
                    {{isset($term_semester->title) ? $term_semester->title : '' }}
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    {{isset($term_semester->description) ? $term_semester->description : '' }}
                </td>
            </tr>

        </table>
        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('common/semester/')}}" class="btn btn-default">Close </a>
    {{--<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>--}}
</div>



