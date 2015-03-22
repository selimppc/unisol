
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Edit Waiver</h4>
</div>

<div class="modal-body">
   <div style="padding: 20px;">

{{ Form::open(['route' => ['admission.amw.waiver.update',$waiver_model->id], 'class'=>'form-horizontal','files' => true,]) }}

     {{ Form::label('title', 'Title') }}
     {{ Form::text('title', $waiver_model->title,array('class' => 'form-control input-sm','placeholder'=>'Enter waiver title','required')) }}

      <br>

     {{ Form::label('description', 'Description') }}
     {{ Form::textarea('description', $waiver_model->description,array('class' => 'form-control input-sm','placeholder'=>'Enter Description','size' => '30x5')) }}

     <br>
     {{ Form::label('waiver_type', 'Waiver Type') }}
     {{ Form::textarea('waiver_type', $waiver_model->waiver_type,array('class' => 'form-control input-sm','placeholder'=>'Enter Description','size' => '30x5')) }}

     <br>

     {{ Form::label('is_percentage', 'Is Percentage ?') }}
     <label class="small">{{ Form::radio('is_percentage',1,($waiver_model->is_percentage == 1)) }} Yes</label>
     <label class="small">{{ Form::radio('is_percentage',0,($waiver_model->is_percentage == 0)) }} No</label>

     <p>&nbsp;</p>

     {{ Form::label('amount', 'Amount') }}
     {{ Form::text('amount', $waiver_model->amount,array('class' => 'form-control input-sm' ,'required')) }}

     {{--<br>--}}
       {{Form::hidden('billing_details_id', 1)}}
     {{--{{ Form::label('billing_details_id', 'Billing Item') }}--}}
     {{--{{ Form::select('billing_details_id',$billing_item,Input::old('billing_details_id'),['class'=>'form-control input-sm','required']) }}--}}

     <p>&nbsp;</p>
      <div>
           {{ Form::submit('Update', array('class'=>'pull-right btn btn-primary')) }}
           <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
      </div>
     <p>&nbsp;</p>

     {{Form::close()}}


   </div>

</div>


