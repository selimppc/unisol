<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>

<div class="row">
    <div class='form-group'>
       {{ Form::text('hr_salary_transaction_id', $s_t_id ,Input::old('hr_salary_transaction_id')) }}
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('type', 'Type') }}
           {{ Form::select('type', array(''=>'Select Type','allowance'=>'allowance','deduction'=>'deduction','over-time'=>'over-time','bonus'=>'bonus','commission'=>'commission'),
                Input::old('type'),['id'=>'salary_transaction_detail_type','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('hr_salary_allowance_id', 'S.Allowance') }}
           {{ Form::select('hr_salary_allowance_id',$salary_allowance_list ,Input::old('hr_salary_allowance_id'),['id'=>'salary_transaction_detail_allowance','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('hr_salary_deduction_id', 'S.Deduction') }}
           {{ Form::select('hr_salary_deduction_id',$salary_deduction_list ,Input::old('hr_salary_deduction_id'),['id'=>'salary_transaction_detail_deduction','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('hr_over_time_id', 'Over-Time') }}
           {{ Form::select('hr_over_time_id',$over_time_list ,Input::old('hr_over_time_id'),['id'=>'salary_transaction_detail_over_time','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('hr_bonus_id', 'Bonus') }}
           {{ Form::select('hr_bonus_id',$bonus_list ,Input::old('hr_bonus_id'),['id'=>'salary_transaction_detail_bonus','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('amount', 'Amount') }}
           {{ Form::text('amount', Input::old('amount'),['id'=>'salary_transaction_detail_amount','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('percentage', 'Percentage') }} (%)
           {{ Form::text('percentage', Input::old('percentage'),['id'=>'salary_transaction_detail_percentage','class'=>'form-control']) }}
        </div>
    </div>

    <div class="col-sm-2">
         <div class='form-group'>
            <input type="button" class="pull-right btn-xs btn-linkedin" id="add-salary-transaction-detail" value="+Add">
         </div>
    </div>

</div>

<div class="table-hide">
<p>
    <b> Salary Transaction Detail</b>
    <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
</p>
<table class="table table-bordered small-header-table" id="amwCourseConfig">
    <thead>
        <th>Type</th>
        <th>Salary Allowance</th>
        <th>Salary Deduction</th>
        <th>Over Time</th>
        <th>Bonus</th>
        <th>Amount</th>
        <th>Percentage(%)</th>
        <th>Action</th>
    </thead>

    <tbody id="test">

    </tbody>

    <tbody>
      <?php $counter = 0;?>
       @foreach($model as $values)
            <tr>
               <td>{{ $values->type }}</td>
               <td>{{ ucfirst($values->relHrSalaryAllowance->title) }}</td>
               <td>{{ ucfirst($values->relHrSalaryDeduction->title) }}</td>
               <td>{{ $values->relHrOverTime->sign_in }}</td>
               <td>{{ $values->relHrBonus->title }}</td>
               <td>{{ $values->percentage }}</td>
               <td>{{ $values->amount }}</td>

               <td>
                   {{--<a href="{{ URL::route('edit-salary-transaction-detail',['s_t_d_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i style="color: #7b24dd" class="fa fa-edit"></i></a>--}}
                   <a data-href="{{ $values->id }}" data-salTrnsDtl="{{ $values->hr_salary_transaction_id }}" class="btn btn-default btn-sm delete-dt-2" id="delete-dt-2{{ $values->id }}" ><i class="fa fa-trash-o" style="font-size: 15px;color: red"></i></a>
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

     $("#add-salary-transaction-detail").click(function(event){
         var $sal_trans_id = "<?php echo $s_t_id; ?>";

         $sal_trns_id = $sal_trans_id;
//         alert($sal_trns_id);
         $sal_trns_dtl_type = $("#salary_transaction_detail_type").val();
         $sal_trns_dtl_amount = $("#salary_transaction_detail_amount").val();
         $sal_trns_dtl_percentage = $("#salary_transaction_detail_percentage").val();
         $sal_trns_dtl_allowance = $("#salary_transaction_detail_allowance").val();
         $sal_trns_dtl_deduction = $("#salary_transaction_detail_deduction").val();
         $sal_trns_dtl_ovrtm = $("#salary_transaction_detail_over_time").val();
         $sal_trns_dtl_bonus = $("#salary_transaction_detail_bonus").val();



         if($sal_trns_dtl_type==null || $sal_trns_dtl_allowance==null || $sal_trns_dtl_deduction==null || $sal_trns_dtl_ovrtm==null ||
            $sal_trns_dtl_bonus==null || $sal_trns_dtl_amount==null || $sal_trns_dtl_percentage == null ){
             alert("please Provide All Salary Transaction Details and then try Again!");
             return false;
         }else{
             $salary_transctn_id = $sal_trans_id; // Salary Transaction ID

             var index = $.inArray($sal_trans_id, $arrayRnc);
             if (index>=0) {
                 alert("You already added this Salary Transaction in the below table");
                 //also flash the existing text field
                 $("#salary_transaction_id").val("");
                 $("#salary_transaction_detail_amount").val("");
                 $("#salary_transaction_detail_percentage").val("");
                 $("#salary_transaction_detail_over_time").val("");
                 $("#salary_transaction_detail_bonus").val("");
                 $("#salary_transaction_detail_type").val("");
                 $("#salary_transaction_detail_allowance").val("");
                 $("#salary_transaction_detail_deduction").val("");

                 return false;
             } else {
                $('#test').append("<tr> " +
                      "<td><input type='' name='hr_salary_transaction_id' value='" + $sal_trans_id + "' readonly><input name='type[]' value='"+ $sal_trns_dtl_type +"' readonly></td>" +
                      "<td><input name='hr_salary_allowance_id[]' value='"+ $sal_trns_dtl_allowance +"' readonly> </td>" +
                      "<td><input name='hr_salary_deduction_id[]' value='"+ $sal_trns_dtl_deduction +"' readonly> </td>" +
                      "<td><input name='hr_over_time_id[]' value='"+ $sal_trns_dtl_ovrtm +"' readonly> </td>" +
                      "<td><input name='hr_bonus_id[]' value='"+ $sal_trns_dtl_bonus +"' readonly> </td>" +
                      "<td><input name='percentage[]' value='"+ $sal_trns_dtl_percentage +"' readonly></td>" +
                      "<td><input name='amount[]' value='"+ $sal_trns_dtl_amount +"' readonly></td>" +

                  " </tr>");

                 $arrayRnc.push($salary_transctn_id);

                 //flush the input fields
//                 $("#salary_transaction_id").val("");
                 $("#salary_transaction_detail_amount").val("");
                 $("#salary_transaction_detail_percentage").val("");
                 $("#salary_transaction_detail_type").val("");
                 $("#salary_transaction_detail_over_time").val("");
                 $("#salary_transaction_detail_bonus").val("");
                 $("#salary_transaction_detail_allowance").val("");
                 $("#salary_transaction_detail_deduction").val("");
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
{{--, sal_trns_dtl_id: $(this).data("salTrnsDtl")--}}
