
{{--{{ HTML::script('assets/js/bootstrap-datepicker.js') }}--}}
{{--{{ HTML::style('assets/css/datepicker.css')}}--}}
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Degree</h4>
</div>

<div class="modal-body">
 <div style="padding: 20px;">

{{ Form::open(['route' => ['degree_waiver.store'], 'class'=>'form-horizontal','files' => true,]) }}



{{ Form::label('duration', 'Duration (In Year)') }}
{{ Form::select ('duration',  array('' => 'Select one',
   '1' => '1', '2' => '2', '3'=>'4','5'=>'5','6'=>'6','7'=>'7'), Input::old('duration'),
    array('class' => 'form-control input-sm')) }}


<br>
{{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary')) }}

{{Form::close()}}


</div>

</div>


