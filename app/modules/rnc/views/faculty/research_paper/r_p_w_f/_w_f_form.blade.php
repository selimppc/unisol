<style>
    input{
        border-color: 1px solid #efefef;
    }
    #test input {
        border: none;
        width: 99%;
    }

</style>

{{--<div class='form-group'>--}}
    {{--<div>{{ Form::label('rnc_research_paper_id', 'RnC Research Paper') }}</div>--}}
    {{--<div>{{ Form::text('rnc_research_paper_id', $rnc_r_p_id, Input::old('rnc_research_paper_id'), array('class' => 'form-control') ) }}</div>--}}
{{--</div>--}}

<div class='form-group'>
   {{ Form::label('user_id', 'Writer Name') }} ( <small>Search Writer by Typing Name</small> )
   {{ Form::text('user_id',  '', ['id'=>'search_writer_name', 'class'=>'ui-autocomplete form-control','placeholder'=>'Search Writer Name..', 'autofocus', ]) }}
</div>
{{Form::hidden('user_id', null,['id'=>'wr-name-id'])}}
{{Form::hidden('rnc_research_paper_id', null,['id'=>'research-paper-id'])}}

{{--{{Form::hidden('invProductId', null,['id'=>'product-id'])}}--}}
{{--{{Form::hidden('invProductName', null,['id'=>'product-name'])}}--}}

<div class='row'>
       <div class="col-sm-3">
        <div class='form-group'>
           {{ Form::label('rncRPWriterName', 'Writer Name') }}
           <input type="text" name="rncRPWriterName" id="writer-name" readonly style="background-color: lavender">
        </div>
    </div>

    <div class="col-sm-3">
        <div class='form-group'>
           {{ Form::label('rncRPBeneficiaryVal', 'Beneficiary Value') }}
           {{ Form::text('rncRPBeneficiaryVal', Input::old('rncRPBeneficiaryVal'),['id'=>'beneficial-value']) }}
        </div>
    </div>
    <div class="col-sm-3" style="padding: 4%">
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

   {{--<tbody>--}}
    {{--<?php $counter = 0;?>--}}

    {{--@foreach($beneficial_info as $key=>$value)--}}
        {{--<tr>--}}
            {{--<td>{{isset($value->inv_product_id) ? $value->relInvProduct->title : ''}}</td>--}}
            {{--<td>{{round($value->rate, 2)}}</td>--}}
            {{--<td>{{round($value->unit)}}</td>--}}
            {{--<td>{{round($value->quantity)}}</td>--}}
            {{--<td>--}}
                {{--<a data-href="{{ $value->id }}" class="btn btn-default btn-sm delete-dt" id="delete-dt{{ $value->id }}" ><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a>--}}

            {{--</td>--}}
        {{--</tr>--}}
        {{--<?php $counter++;?>--}}
        {{--<script>--}}
            {{--// Add item is to arrayList at edit time.--}}
            {{--$( document ).ready(function() {--}}
                {{--var productsId = {{ $value->inv_product_id }}--}}
                {{--pushListItem(productsId);--}}
            {{--});--}}
        {{--</script>--}}
   {{--@endforeach--}}

</table>

{{ Form::submit('Submit', ['class'=>'pull-right btn btn-xs btn-success', 'style'=>'padding: 1%;'] ) }}



<p>&nbsp;</p>


{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<script type="text/javascript">

 $(function(){
         $( "#search_writer_name" ).autocomplete({
          source: "/rnc/ajax/get-writer-name-auto-complete",
          minLength: 1,
          select: function(event, ui) {
            $('#search_writer_name').val(ui.item.label);
            $('#wr-name-id').val(ui.item.user_id);

            //$('#research-paper-id').val(ui.item.rsrch_ppr);
            $('#writer-name').val(ui.item.label);


          }
        });



 //Product Add(s)
     $tableItemCounter = 0; //To stop additem if exist
     var $arrayRnc = []; //To stop additem if exist

//     function pushListItem(productsId){
//         $arrayProducts.push(productsId);
//     };

     $("#add-writer-and-beneficial").click(function(event){
         $res_pap_id = $("#research-paper-id").val();
         $wrtr_nm = $("#writer-name").val();
         $benfcl_val = $("#beneficial-value").val();

         if($wrtr_nm == null || $benfcl_val == null){
             alert("please add Writer Name and Beneficial then try Again!");
             return false;
         }else{
             $wrtr_nm = $("#writer-name").val();
             var index = $.inArray($wrtr_nm, $arrayRnc);
             if (index>=0) {
                 alert("You already added this Writer in the below table");
                 //also flash the existing text field
                 $("#writer-name").val("");
                 $("#beneficial-value").val("");
                 $("#search_writer_name").val("");
                 return false;
             } else {

                 $('#test').append("<tr> " +
                      "<td><input name='w_name[]' value='"+$wrtr_nm+"' readonly> </td>" +
                      "<td><input name='bnfcl_val[]' value='"+$benfcl_val+"' readonly></td>" +
                      "<td><input name='quantity[]' value='"+$res_pap_id+"' readonly></td>" +
                  " </tr>");
                 $arrayRnc.push($wrtr_nm);

                 //flush the input fields
                 $("#research-paper-id").val("");
                 $("#writer-name").val("");
                 $("#beneficial-value").val("");
                 $("#search_writer_name").val("");
             }
         }

 	});

});


</script>