<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Or Update</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
       {{ Form::open(['route' => ['admission.public.save-exm-center'], 'class'=>'form-horizontal','files' => true,]) }}
            {{ Form::hidden('batch_applicant_id', $ba_id )}}
            @if(isset($exm_centers_all))
                @foreach($exm_centers_all as $values)
                    Choice Sequence : {{ Form::select('exm_center_id[]', $exm_center_lists,$values->id,['class'=>'form-control input-sm','required']) }}
                @endforeach
            @else
                 @foreach($exm_center_choice as $values)
                    {{ Form::hidden('id[]', $values->id )}}
                    Choice Sequence: {{ Form::select('exm_center_id[]', $exm_center_lists, $values->exm_center_id,['class'=>'form-control input-sm','required']) }}
                 @endforeach
            @endif

            <p>&nbsp;</p>
            <p>&nbsp;</p>

            {{ Form::submit('Save', array('class'=>'pull-right btn btn-xs btn-primary')) }}
            <a  href="" class="pull-right btn btn-xs btn-default" style="margin-right: 5px">Close</a>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
       {{Form::close()}}
     </div>
</div>
