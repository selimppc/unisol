<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3 style="text-align: center;">HR Leave Comments</h3>
</div>

<div style="padding-left: 10px; width: 90%;">

    {{ Form::open(array('route'=>'update.leave.comments','method' => 'POST')) }}
    {{Form::hidden('id', $model->id)}}
        <div  style="padding-left: 8%">
            <p>&nbsp;</p>
            <p>
                <table class="table table-striped  table-bordered">
                     <tr>
                        <td>Leave Type:</td>
                        <td>{{isset($model->hr_leave_type_id)?$model->relHrLeaveType->title:''}}</td>
                     </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            <div class="form-group">
                                {{ Form::select ('status',  array('' => 'Select one',
                                    'rejected' => 'Rejected', 'canceled' => 'Canceled','pending-approval'=>'pending Approval',
                                    'scheduled'=>'Scheduled','taken'=>'Taken','approved'=>'Approved'),$model->status,
                                     array('class' => 'form-control ','required')) }}
                            </div>
                        </td>
                    </tr>
                </table>
                <small>Comments as below: </small>
                @if(isset($comments))
                    @foreach($comments as $ct)
                       <p style="padding: 1%; background: #efefef;">
                         <b>{{ isset($ct->created_by)? User::FullName($ct->created_by):'' }}</b>:
                         &nbsp; {{ isset($ct->comment)?$ct->comment:''}}
                       </p>
                    @endforeach
                @endif
                <div class="form-group">
                   {{ Form::textarea('comment', Null, ['class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;','required'=>'required']) }}
                </div>
            </p>
        </div>
    {{ Form::submit('Submit Comment', array('class'=>'pull-right btn-sm btn-info')) }}
    <a href="" class="pull-right btn-sm btn-default" style="margin-right: 5px">Close</a>
    &nbsp;
    </br>
    &nbsp;
    {{ Form::close() }}
    <p>&nbsp;</p>
</div>