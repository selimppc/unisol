<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Waiver</h4>
</div>

<div class="modal-body">
   <div style="padding: 20px;">

{{ Form::open(['route' => ['common.waiver.store'], 'class'=>'form-horizontal','files' => true,]) }}

     {{ Form::label('title', 'Title') }}
     {{ Form::text('title', Input::old('title'),array('class' => 'form-control input-sm','placeholder'=>'Enter waiver title','required')) }}

      <br>

     {{ Form::label('description', 'Description') }}
     {{ Form::textarea('description', Input::old('description'),array('class' => 'form-control input-sm','placeholder'=>'Enter Description','size' => '30x5')) }}

     {{ Form::label('waiver_type', 'Waiver Type') }}
     {{ Form::text('waiver_type', Input::old('waiver_type'),array('class' => 'form-control input-sm' ,'required')) }}

     <br>

     {{ Form::label('is_percentage', 'Is Percentage ?') }}
     <label class="small">{{ Form::radio('is_percentage','1', false, ['required'=>true]) }} Yes</label>
     <label class="small">{{ Form::radio('is_percentage','0', false, ['required'=>true]) }} No</label>

     <p>&nbsp;</p>

     {{ Form::label('amount', 'Amount') }}
     {{ Form::text('amount', Input::old('amount'),array('class' => 'form-control input-sm' ,'required')) }}

     <br>

     {{ Form::label('billing_details_id', 'Billing Item') }}
     {{--{{ Form::select('billing_details_id',$billing_details,Input::old('billing_details_id'),['class'=>'form-control input-sm','required']) }}--}}

     <p>&nbsp;</p>

     {{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary')) }}

     <p>&nbsp;</p>

     {{Form::close()}}


   </div>

</div>


