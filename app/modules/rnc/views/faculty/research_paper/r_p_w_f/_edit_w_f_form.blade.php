{{Form::hidden('ben_id', $ben_id,['id'=>'ben-id'])}}
{{Form::hidden('rnc_research_paper_id', $rnc_r_p_id,['id'=>'research-paper-id'])}}
{{Form::hidden('writer_user_id', Input::old('writer_user_id'),['id'=>'wr-name-id'])}}

<div class='row'>

        <div class='form-group'>
           {{ Form::label('writer_user_id', 'Writer Name') }}
           {{ Form::text('writer_user_id', $edit_info->writer_user_id ,
                ['readonly','style'=>'background-color : lavender' , 'padding-right :20px'])
           }}
        </div>

        {{--$edit_info->writer_user_id) ? $edit_info->relUser->relUserProfile->first_name : ''--}}

        <div class='form-group'>
           {{ Form::label('value', 'Beneficiary Value') }}
           {{ Form::text('value', $edit_info->relRnCWriterBeneficial->value, Input::old('value'),['id'=>'beneficial-value']) }}
        </div> &nbsp;
        {{--{{ $cal_benefit_share }} % is already divided. Now this is for writer's share--}}

        {{ Form::submit('Update', ['class'=>'pull-right btn btn-sm btn-linkedin', 'style'=>'padding: 1.5%;'] ) }}

</div>