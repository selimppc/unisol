<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>

<div class="row">

<div class='form-group'>
   {{ Form::hidden('hr_loan_head_id', $loan_head_id , Input::old('hr_loan_head_id')) }}
</div>

    <div class="col-sm-4">
        <div class='form-group'>
           {{ Form::label('amount', 'Amount') }}
           {{ Form::text('amount', Input::old('amount'),['id'=>'hr_loan_detail_amount','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-4" >
        <div class='form-group'>
           {{ Form::label('date', 'Date') }}
           {{ Form::text('date',  Input::old('date'),['id'=>'hr_loan_detail_date','class'=>'form-control date_picker']) }}
        </div>
    </div>

    <div class="col-sm-2">
         <div class='form-group'>
            <input type="button" class="pull-right btn-xs btn-linkedin" id="add-hr-loan-detail" value="+Add">
         </div>
    </div>

</div>

<div class="table-hide">
<p>
    <b> Loan Detail</b>
    <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
</p>
<table class="table table-bordered small-header-table" id="amwCourseConfig">
    <thead>
        <th>Amount</th>
        <th>Date</th>
        <th>Action</th>
    </thead>

    <tbody id="test"> </tbody>

    <tbody>
      <?php $counter = 0;?>
        @foreach($model as $values)
         <tr>
            <td>{{ $values->amount }}</td>
            <td>{{ $values->date }}</td>
            <td>
                <a data-href="{{ $values->id }}" class="btn btn-default btn-sm delete-dt-2" id="delete-dt-2{{ $values->id }}" ><i class="fa fa-trash-o" style="font-size: 15px;color: red"></i></a>
            </td>

         </tr>
         <?php $counter++;?>
        @endforeach
    </tbody>
</table>


<div class="modal-footer">
    {{ Form::submit('Submit', ['class'=>'btn btn-xs btn-success', 'style'=>'padding: 1.5%;'] ) }}
     <button class="btn btn-primary btn-large" data-dismiss="modal" type="button">Close</button>
</div>
</div>
<p>&nbsp;</p>

{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<script type="text/javascript">
$(function(){

    //Beneficial Add(s) : ok
     $tableItemCounter = 0; //To stop additem if exist
     var $arrayRnc = []; //To stop additem if exist

     $("#add-hr-loan-detail").click(function(event){
         var $ln_hd_id = "<?php echo $loan_head_id; ?>";

         $loan_head_id = $ln_hd_id;
         $hr_ln_dtl_amount = $("#hr_loan_detail_amount").val();
         $hr_ln_dtl_date = $("#hr_loan_detail_date").val();

         if($hr_ln_dtl_amount==null || $hr_ln_dtl_date==null ){
             alert("please Provide All Loan Detail and then try Again!");
             return false;
         }else{
             $hr_loan_head_id = $ln_hd_id; // Salary Transaction ID

             var index = $.inArray( $arrayRnc);
             if (index>=0) {
                 alert("You already added this Loan Detail in the below table");
                 //also flash the existing text field
                 $("#hr_loan_detail_amount").val("");
                 $("#hr_loan_detail_date").val("");

                 return false;
             } else {
                $('#test').append("<tr> " +
                      "<td><input type='hidden' name='hr_loan_head_id' value='" + $ln_hd_id + "' readonly>" +"<input name='amount[]' value='"+ $hr_ln_dtl_amount +"' readonly></td>" +
                       "<td><input name='date[]' value='"+ $hr_ln_dtl_date +"' readonly></td>" +
                  " </tr>");

                 $arrayRnc.push($hr_loan_head_id);

                 //flush the input fields
                 $("#hr_loan_detail_amount").val("");
                 $("#hr_loan_detail_date").val("");
             }
         }
 	 });

    //delete : ok
     $('.delete-dt-2').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'ajax-delete-salary-trn-dtl',
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