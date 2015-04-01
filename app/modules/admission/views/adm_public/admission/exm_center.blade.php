<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Or Update</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
       {{ Form::open(['route' => ['admission.public.save-exm-center'], 'class'=>'form-horizontal','files' => true,]) }}

            {{--{{ Form::hidden('batch_applicant_id', $batch_applicant_id)}}--}}
            {{ Form::select('exm_center_id',$exm_centers,Input::old('exm_center_id'),['class'=>'form-control input-sm','required'=>'required']) }}

            <p>&nbsp;</p>
            <p>&nbsp;</p>

            {{ Form::submit('Save', array('class'=>'pull-right btn btn-xs btn-primary')) }}
            <a  href="" class="pull-right btn btn-xs btn-default" style="margin-right: 5px">Close</a>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
       {{Form::close()}}
     </div>
</div>
{{--{{ Form::select('title',$exm_centers,Input::old('title'),['class'=>'form-control input-sm','required'=>'required']) }}--}}
