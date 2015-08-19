<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Show Subject</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'subject/show','method' => '')) }}
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <td>Subject:</td>
                <td>
                    {{isset( $subject->title) ?  $subject->title : '' }}
                </td>
            </tr>
            <tr>
                <td>Department:</td>
                <td>
                    {{isset($subject->relDepartment->title) ? $subject->relDepartment->title : '' }}
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    {{isset($subject->description) ? $subject->description : '' }}
                </td>
            </tr>

        </table>
        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('common/subject/')}}" class="btn btn-default">Close </a>
</div>