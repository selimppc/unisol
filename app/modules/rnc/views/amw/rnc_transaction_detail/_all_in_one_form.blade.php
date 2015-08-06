<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>

<div class="row" style="padding-bottom: 10px ">
    <div class='form-group'>
        <h4><b>Research Paper Price :</b><b style="color: #2327db"> {{ $rnc_name->relRncResearchPaper->price }}</b></h4>
    </div>

</div>

<div class="row">
    <div class="row" style="padding-bottom: 10px ">
         <div class='form-group'>
             {{ Form::hidden('rnc_transaction_id', $r_t_id ,Input::old('rnc_transaction_id')) }}
         </div>
    </div>

    <div class="col-sm-2" style="width:17%">
        <div class='form-group'>
           {{ Form::label('transaction_type', 'Type') }}
           {{ Form::select('transaction_type', array(''=>'Select Type','partial'=>'Partial','full'=>'Full'),
                Input::old('transaction_type'),['id'=>'rnc_transaction_detail_type','class'=>'shafi_type form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="display:none;width:17%">
        <div class='form-group'>
           {{ Form::hidden('rnc_transaction_id',$r_t_id ,Input::old('rnc_transaction_id'),['id'=>'rnc_transaction_detail_id','class'=>'bonus_name shafi form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:17%">
        <div class='form-group'>
           {{ Form::label('amount', 'Amount') }}
           {{ Form::text('amount', Input::old('amount'),['id'=>'rnc_transaction_detail_amount','class'=>'std_amount form-control']) }}
        </div>
    </div>

    <div class="col-sm-2">
         <div class='form-group' style="padding-top: 10px;"></br>
            <input type="button" class="pull-right btn-xs btn-linkedin" id="add-rnc-transaction-detail" value="+Add">
         </div>
    </div>
</div>

<div class="table-hide">
    <p>
       <b> RNC Transaction Detail</b>
       <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
    </p>

    <table class="table table-bordered small-header-table" id="amwCourseConfig">
        <thead>
            <th>Transaction Type</th>
            <th>Amount</th>
            <th>Action</th>
        </thead>

        <tbody id="test">
        </tbody>

        <tbody>
          <?php $counter = 0;?>
               @foreach($model as $values)
                    <tr>
                       <td>{{ ucfirst($values->transaction_type) }}</td>
                       <td>{{ isset($values->amount) ? round($values->amount,2) : ""}}</td>
                       <td>
                           <a data-href="{{ $values->id }}" class="btn btn-default btn-sm delete-dt-2" ><i class="fa fa-trash-o" style="font-size: 15px;color: red"></i></a>
                       </td>
                    </tr>
                    <?php $counter++;?>
               @endforeach
        </tbody>
    </table>

    <div class="modal-footer">
        {{ Form::submit('Submit', ['class'=>'btn btn-large btn-success'] ) }}
        <button class="btn btn-default btn-large" data-dismiss="modal" type="button">Close</button>
    </div>
</div>
<p>&nbsp;</p>

{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<script type="text/javascript">
$(function(){
//Add Data : on going
     $tableItemCounter = 0;
     var $arrayRnc = [];

     $("#add-rnc-transaction-detail").click(function(event){
            var $rnc_trans_id = "<?php echo $r_t_id; ?>";

            $rnc_trns_id = $rnc_trans_id;
            $rnc_trns_dtl_type = $("#rnc_transaction_detail_type").val();
            $rnc_trns_dtl_amount = $("#rnc_transaction_detail_amount").val();
            $rnc_trns_dtl_id = $("#rnc_transaction_detail_id").text();

            $rnc_transctn_id = $rnc_trans_id; // Salary Transaction ID

            var index = $.inArray( $arrayRnc);
            if (index>=0) {
                 alert("You already added this Salary Transaction in the below table");
                 // Also flash the existing text field
                 $("#rnc_transaction_id").val("");
                 $("#rnc_transaction_detail_amount").val("");
                 $("#rnc_transaction_detail_id").val("");
                 $("#rnc_transaction_detail_type").val("");


                 return false;
            } else {
                $('#test').append("<tr> " +

                      "<td><input type='hidden' name='rnc_transaction_id[]' value='" + $rnc_trans_id + "' readonly><input name='transaction_type[]' value='"+ $rnc_trns_dtl_type +"' readonly></td>" +
                      "<td><input name='amount[]' value='"+ $rnc_trns_dtl_amount +"' readonly></td>" +

                " </tr>");

                 $arrayRnc.push($rnc_transctn_id);

                 //flush the input fields
                 $("#rnc_transaction_detail_amount").val("");
                 $("#rnc_transaction_detail_type").val("");
                 $("#rnc_transaction_detail_id").val("");
                 $('.std_amount').prop('enable', true);
            }
 	 });

//Delete : ok
     $('.delete-dt-2').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'ajax-delete-rnc-trn-dtl',
            type: 'POST',
            dataType: 'json',
            data: { id:  $(this).data("href") },
            success: function(response)
            {
                $btn.closest("tr").remove();
                $('#something-delete').html(response);
            }
        });
     });
});
</script>