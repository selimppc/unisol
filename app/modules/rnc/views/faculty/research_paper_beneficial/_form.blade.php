<div class='form-group'>
    <div>{{ Form::label('rnc_research_paper_id', 'RnC Research Paper') }}</div>
    <div>{{ Form::text('rnc_research_paper_id', $rnc_r_p_id , Input::old('rnc_research_paper_id'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
   {{ Form::label('rnc_research_paper_writer_id', 'RnC Writer Name') }} ( <small>Writer Name</small> )
   {{ Form::text('rnc_research_paper_writer_id',$id , ['class'=>'orm-control','autofocus' ]) }}
</div>

<div class='form-group'>
    <div>{{ Form::label('value', 'Value') }} &nbsp; {{ $cal_benefit_share }} % is already divided. Now this is for writer's share </div>
    <div>{{ Form::text('value', Input::old('value'),array('onchange'=>"getShareBenefit()", 'placeholder'=>'Writer Value..','id'=>'given_share','class'=>'form-control','required'=>'required')) }}</div>
</div>

<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success','id'=>'submit_if')) }}
    <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>


<script>
 function getShareBenefit(){
                 var total_count_share = "<?php echo $cal_benefit_share; ?>";

                 var total_share = parseInt(document.getElementById("given_share").value);
                 var compare = parseInt(total_count_share) + parseInt(total_share);
                 //alert(compare +'  ,'+ 'Exceed the Total share 100%. Please decrease your share percentage');

                    if( compare > 100 ){
                        alert(compare +'  ,'+ 'Exceed the Total share 100%. Please decrease your share percentage');
                        return false;
                    }else{
                        return true;
                    }
 }
</script>




