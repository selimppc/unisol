<div class='form-group'>
    <div>{{ Form::label('rnc_research_paper_id', 'RnC Research Paper') }}</div>
    <div>{{ Form::text('rnc_research_paper_id', $rnc_r_p_id, Input::old('rnc_research_paper_id'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
   {{ Form::label('rnc_research_paper_writer_id', 'RnC Writer Name') }} ( <small>Writer Name</small> )
   {{ Form::text('rnc_research_paper_writer_id',$w_id , ['class'=>'orm-control','autofocus' ]) }}
</div>

{{--<div class='form-group'>--}}
   {{--{{ Form::label('rnc_research_paper_writer_id', 'RnC Writer Name') }} ( <small>Search Writer by Typing Name</small> )--}}
   {{--{{ Form::text('rnc_research_paper_writer_id',  '', ['id'=>'search_writer_name', 'class'=>'ui-autocomplete form-control','placeholder'=>'Search Writer Name..', 'autofocus', ]) }}--}}
{{--</div>{{Form::hidden('rnc_research_paper_writer_id', null,['id'=>'wr-name-id'])}}--}}


<div class='form-group'>
    <div>{{ Form::label('value', 'Value') }} &nbsp; {{ $rp_benefit_share }} % share is already booked. now this is for writer's share </div>
    <div>{{ Form::text('value', Input::old('value'),array('placeholder'=>'Writer Value..','class'=>'form-control','required'=>'required')) }}</div>
</div>

<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
    <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>


{{--{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}--}}
{{--{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}--}}

{{--<script type="text/javascript">--}}

 {{--$(function(){--}}
         {{--$( "#search_writer_name" ).autocomplete({--}}
          {{--source: "/rnc/ajax/get-writer-name-auto-complete",--}}
          {{--minLength: 1,--}}
          {{--select: function(event, ui) {--}}
            {{--$('#search_writer_name').val(ui.item.label);--}}
            {{--$('#wr-name-id').val(ui.item.user_id);--}}
          {{--}--}}
        {{--});--}}
    {{--});--}}

{{--</script>--}}




