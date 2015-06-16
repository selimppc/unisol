<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 99%; }

</style>

<div class='form-group'>
   {{ Form::label('searchName', 'Writer Name') }} ( <small>Search Writer by Typing Name</small> )
   {{ Form::text('searchName',  '', ['id'=>'search_writer_name', 'class'=>'ui-autocomplete form-control','placeholder'=>'Search Writer Name..', 'autofocus', ]) }}
</div>


{{Form::hidden('rnc_research_paper_id', $rnc_r_p_id,['id'=>'research-paper-id'])}}

<div class='row'>
       <div class="col-sm-4">
        <div class='form-group'>
           {{ Form::label('writer_user_id', 'Writer Name') }}
           <input type="text" id="writer-name" readonly style="background-color: lavender;padding-right: 20px">
           {{Form::hidden('writer_user_id', Input::old('writer_user_id'),['id'=>'wr-name-id'])}}
        </div>
    </div>

    <div class="col-sm-4">
        <div class='form-group'>
           {{ Form::label('value', 'Beneficiary Value') }}
           {{ Form::text('value', Input::old('value'),['id'=>'beneficial-value']) }}
        </div> &nbsp; {{ $cal_benefit_share }} % is already divided. Now this is for writer's share
    </div>


    {{--<div class='form-group'>--}}
        {{--<div>{{ Form::label('value', 'Value') }} &nbsp; {{ $cal_benefit_share }} % is already divided. Now this is for writer's share </div>--}}
        {{--<div>{{ Form::text('value', Input::old('value'),array('onchange'=>"getShareBenefit()", 'placeholder'=>'Writer Value..','id'=>'given_share','class'=>'form-control','required'=>'required')) }}</div>--}}
    {{--</div>--}}




    <div class="col-sm-4" style="padding: 4%">
        <input type="button" class="pull-right btn-xs btn-linkedin" id="add-writer-and-beneficial" value="+Add">
    </div>
</div>

<p>
    <b> RP Detail(s) with Writer and Beneficial</b>
    <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
</p>
<table class="table table-bordered small-header-table" id="amwCourseConfig">
    <thead>
    <th>Writer Name </th>
    <th>Beneficial Value </th>
    <th>Action</th>
    </thead>
    <tbody id="test">
    </tbody>

    {{--{{Form::hidden('rnc_research_paper_writer_id', $writer_info->id)}}--}}

   <tbody>
    <?php $counter = 0;?>

    @foreach($writer_info as $key=>$model_value)
        <tr id="new-row-rnc-{{ $model_value->id }}">
            <td id="new-column-name-{{ $model_value->id }}"> {{isset($model_value->writer_user_id) ? $model_value->relUser->relUserProfile->first_name.' '.$model_value->relUser->relUserProfile->middle_name.' '.$model_value->relUser->relUserProfile->last_name : ''}}
            </td>
            <td id="new-column-value-{{ $model_value->id }}">{{ $model_value->relRnCWriterBeneficial->value }}</td>
            <td>
                <a data-href="{{ $model_value->id }}" data-benf="{{$model_value->relRnCWriterBeneficial->id}}" class="btn btn-default btn-sm delete-dt-2" id="delete-dt-2{{ $model_value->id }}" ><i class="fa fa-trash-o" style="font-size: 15px;color: red"></i></a>
                <a data-href="{{ $model_value->id }}" class="btn btn-default btn-sm edit-dt-rnc" id="delete-dt-2{{ $model_value->id }}" ><i class="fa fa-pencil" style="font-size: 15px;color: dodgerblue"></i></a>
                {{--<a href="{{ URL::route('faculty.research-paper-writer-beneficial.edit', ['id'=>$model_value->id , 'ben_id'=>$model_value->relRnCWriterBeneficial->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc" title="Edit"></i></a>--}}
            </td>
        </tr>
        <?php $counter++;?>
        {{--<script>--}}
            {{--// Add item is to arrayList at edit time.--}}
            {{--$( document ).ready(function() {--}}
                {{--var productsId = {{ $value->inv_product_id }}--}}
                {{--pushListItem(productsId);--}}
            {{--});--}}
        {{--</script>--}}
   @endforeach

</table>

<div class="modal-footer">
    {{ Form::submit('Submit', ['class'=>'btn btn-xs btn-success', 'style'=>'padding: 1.5%;'] ) }}
    <button class="btn btn-primary btn-large" data-dismiss="modal" type="button">Close</button>
</div>
<p>&nbsp;</p>


{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<script type="text/javascript">

 $(function(){
     $( "#search_writer_name" ).autocomplete({
      source: "/rnc/ajax/fac-get-writer-name-auto-complete",
      minLength: 1,
      select: function(event, ui) {
        $('#select_writer_name').val(ui.item.label);
        $('#wr-name-id').val(ui.item.writer_user_id);
        $('#writer-name').val(ui.item.label);
      }
});



    //Product Add(s) : ok
     $tableItemCounter = 0; //To stop additem if exist
     var $arrayRnc = []; //To stop additem if exist

     $("#add-writer-and-beneficial").click(function(event){
         $res_pap_id = $("#research-paper-id").val();
         $writer_id = $("#wr-name-id").val();
         //$writer_name_val = $("#writer_name").val();
         $benfcl_val = $("#beneficial-value").val();
         $wr_name = $("#writer-name").val();
         var total_count_share = "<?php echo $cal_benefit_share; ?>";

         if($writer_id == null || $benfcl_val == null ){
             alert("please add Writer Name and Beneficial then try Again!");
             return false;
         }else{
             $wrtr_u_id = $("#wr-name-id").val(); // writer user ID
             var index = $.inArray($wrtr_u_id, $arrayRnc);
             if (index>=0) {
                 alert("You already added this Writer in the below table");
                 //also flash the existing text field
                 $("#writer-name").val("");
                 $("#wr-name-id").val("");
                 $("#beneficial-value").val("");
                 $("#writer-name").val("");
                 $("#search_writer_name").val("");

                 return false;
             } else {

                 var $total_ben = parseInt(total_count_share) + parseInt($benfcl_val);

                 if($total_ben > 100){
                    $("#beneficial-value").val("");
                        alert( $total_ben +'  ,'+ 'Exceeded the Total share 100%. Please decrease your share percentage');
                    $("#beneficial-value").focus();
                    return false;
                 }else{
                    $('#test').append("<tr> " +
                          "<td><input value='"+ $wr_name +"' readonly> <input type='hidden' name='writer_user_id[]' value='"+ $writer_id +"'> </td>" +
                          "<td><input name='value[]' value='"+ $benfcl_val +"' readonly></td>" +
                      " </tr>");

                     $arrayRnc.push($wrtr_u_id);

                     //flush the input fields
                     $("#writer-name").val("");
                     $("#beneficial-value").val("");
                     $("#writer-name").val("");
                     $("#search_writer_name").val("");
                 }


             }
         }

 	});


// 	//delete : ok
	$(function(){
          $('.delete-dt-2').click(function(e) {
            e.preventDefault();
            var $btn = $(this);
            $.ajax({
                url: '/rnc/faculty/research-paper-writer-beneficial/ajax-delete-req-detail',
                type: 'POST',
                dataType: 'json',
                data: { id:  $(this).data("href"), ben_id: $(this).data("benf") },
                success: function(response)
                {
                    $btn.closest("tr").remove();
                    $('#something-delete').html(response);

                }
            });
          });
       });

       //edit
       $(function(){
         $('.edit-dt-rnc').click(function(e) {
            e.preventDefault();
            var $row = $(this);
            var $id = $row.data("href");
            var $ben_name = $("#new-column-name-"+$id).html();
            var $ben_value = $("#new-column-value-"+$id).html();
            $("#new-row-rnc-"+$id).hide();

            // ei url die duita ID pas skorte hobe : $id, $ben_id   like     , ['id'=>$writer_info->id ,'ben_id'=>$writer_info->relRnCWriterBeneficial->id ]
            var $form_start =    "<form action='{{ url("rnc/faculty/research-paper-writer-beneficial/update") }}' method='POST'><tr>";
            var $form_end = "</tr></form>";

            $('#test').append($form_start +
              "<input value='"+ $ben_name +"' readonly style='width: 270px; '> <input type='hidden' value='"+ $id +"' name='id'>" +
              "<input name='value' value="+ $ben_value +" style='background: #efefef ; width: 120px '>" +
              "<input type='submit' value='Submit' class='btn btn-default btn-sm'>" +
              $form_end);

              //Back up
              /*$('#test').append("<tr>" +
              "<td><input value='"+ $ben_name +"' readonly> <input type='hidden' value='"+ $id +"' name='id'></td>" +
              "<td><input name='value' value="+ $ben_value +" style='background: #efefef ; width: 50%; '></td>" +
              "<td> <a href='' class='btn btn-default btn-sm'><i class='fa fa-check' ></i></a></td>" +
              " </tr>");*/

         });
      });
});


</script>

 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true"  data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
  </div>