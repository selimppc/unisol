
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Or Update</h4>
</div>

 <style>
	ul { list-style-type: none; margin: 0; padding: 0; margin-bottom: 15px; }
	li { margin: 10px; padding: 5px; width: 270px; }
 </style>


<div class="modal-body">
     <div style="padding: 20px;">

     <ul id="sortable">
     	<li class="ui-state-default">1. Dhaka</li>
     	<li class="ui-state-default">2. Chittagong</li>
     	<li class="ui-state-default">3. Comilla</li>
     	<li class="ui-state-default">4. Barisal</li>
     	<li class="ui-state-default">5. Syllhet</li>
     </ul>

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


<script>
	$(function() {
		$( "#sortable" ).sortable({
			revert: true
		});
		$( "#draggable" ).draggable({
			connectToSortable: "#sortable",
			helper: "clone",
			revert: "invalid"
		});
		$( "ul, li" ).disableSelection();
	});
</script>

{{ HTML::style('assets/css/jquery-ui.css') }}
{{ HTML::script('assets/js/jquery-1.10.2.js')}}


