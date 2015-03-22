
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Waiver</h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">
        {{ Form::open(['route' => ['admission.amw.batch-waiver.store'], 'class'=>'form-horizontal','files' => true,]) }}

        {{--{{ Form::hidden('batch_id', $batch_id)}}--}}
        {{ Form::label('waiver_id', 'Waiver Item') }}
        {{ Form::select('waiver_id',$waiverList,Input::old('waiver_id'),['class'=>'form-control input-sm','required'=>'required']) }}

        <p>&nbsp;</p>

        <p>&nbsp;</p>
        <p>&nbsp;</p>


        {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary')) }}
        <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

        <p>&nbsp;</p>
        {{Form::close()}}

    </div>

</div>


