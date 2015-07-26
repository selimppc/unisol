<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>

<div class="row">
    <div class="row" style="padding-bottom: 10px ">
         <div class='form-group'>
             {{ Form::hidden('salary_trn_hd_id', $s_t_id ,Input::old('salary_trn_hd_id')) }}
         </div>

         <div class='form-group col-sm-2'>
                Amount:{{ Form::text('someInfo' ,null,['id'=>'salary-data']) }}
         </div>

          </br>
      </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('type', 'Type') }}
           {{ Form::select('type', array(''=>'Select Type','allowance'=>'Allowance','deduction'=>'Deduction','over-time'=>'Over-Time','bonus'=>'Bonus'),
                Input::old('type'),['id'=>'salary_transaction_detail_type','class'=>'shafi_type form-control']) }}
        </div>
    </div>

    <div id="allowanceType" class="col-sm-2" style="display:none;width:13%">
        <div class='form-group'>
           {{ Form::label('hr_salary_allowance_id', 'S.Allowance') }}
           {{ Form::select('hr_salary_allowance_id',$salary_allowance_list ,Input::old('hr_salary_allowance_id'),['id'=>'salary_transaction_detail_allowance','class'=>'shafi form-control']) }}
        </div>
    </div>

    <div id="deductionType" class="col-sm-2" style="display:none;width:13%">
        <div class='form-group'>
           {{ Form::label('hr_salary_deduction_id', 'S.Deduction') }}
           {{ Form::select('hr_salary_deduction_id',$salary_deduction_list ,Input::old('hr_salary_deduction_id'),['id'=>'salary_transaction_detail_deduction','class'=>'shafi form-control']) }}
        </div>
    </div>

    <div id="overTimeType" class="col-sm-2" style="display:none;width:13%">
        <div class='form-group'>
           {{ Form::label('hr_over_time_id', 'Over-Time') }}
           {{ Form::select('hr_over_time_id',$over_time_list ,Input::old('hr_over_time_id'),['id'=>'salary_transaction_detail_over_time','class'=>'shafi form-control']) }}
        </div>
    </div>

    <div id="bonusType" class="col-sm-2" style="display:none;width:13%">
        <div class='form-group'>
           {{ Form::label('hr_bonus_id', 'Bonus') }}
           {{ Form::select('hr_bonus_id',$bonus_list ,Input::old('hr_bonus_id'),['id'=>'salary_transaction_detail_bonus','class'=>'shafi form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('percentage', 'Percentage') }} (%)
           {{ Form::text('percentage', Input::old('percentage'),['id'=>'salary_transaction_detail_percentage','class'=>'std_percentage form-control']) }}
        </div>
    </div>

    <div class="col-sm-2" style="width:13%">
        <div class='form-group'>
           {{ Form::label('amount', 'Amount') }}
           {{ Form::text('amount', Input::old('amount'),['id'=>'salary_transaction_detail_amount','class'=>'std_amount form-control']) }}
        </div>
    </div>

    <div class="col-sm-2">
         <div class='form-group' style="padding-top: 10px;"></br>
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
        <th>Percentage(%)</th>
        <th>Amount</th>
        <th>Action</th>
    </thead>

    <tbody id="test">
    </tbody>

    <tbody>
      <?php $counter = 0;?>
       @foreach($model as $values)
            <tr>
               <td>{{ ucfirst($values->type) }}</td>
               <td>{{ isset($values->relHrSalaryAllowance->title) ? (ucfirst($values->relHrSalaryAllowance->title)) : "" }}</td>
               <td>{{ isset($values->relHrSalaryDeduction->title) ? (ucfirst($values->relHrSalaryDeduction->title)) : "" }}</td>
               <td>{{ isset($values->relHrOverTime->amount) ? $values->relHrOverTime->amount : "" }}</td>
               <td>{{ isset($values->relHrBonus->title) ? (ucfirst($values->relHrBonus->title)) : "" }}</td>
               <td>{{ isset($values->percentage) ? round($values->percentage,2) : ""}}</td>
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
    //Beneficial Add(s) : ok
     $tableItemCounter = 0; //To stop additem if exist
     var $arrayRnc = []; //To stop additem if exist

     $("#add-salary-transaction-detail").click(function(event){
         var $sal_trans_id = "<?php echo $s_t_id; ?>";

         $sal_trns_id = $sal_trans_id;
         $sal_trns_dtl_type = $("#salary_transaction_detail_type").val();
         $sal_trns_dtl_amount = $("#salary_transaction_detail_amount").val();
         $sal_trns_dtl_percentage = $("#salary_transaction_detail_percentage").val();
         $sal_trns_dtl_allowance = $("#salary_transaction_detail_allowance").val();
         $sal_trns_dtl_deduction = $("#salary_transaction_detail_deduction").val();
         $sal_trns_dtl_ovrtm = $("#salary_transaction_detail_over_time").val();
         $sal_trns_dtl_bonus = $("#salary_transaction_detail_bonus").val();

         if($sal_trns_dtl_type == null || $sal_trns_dtl_allowance == null || $sal_trns_dtl_deduction == null ||
            $sal_trns_dtl_ovrtm == null || $sal_trns_dtl_bonus==null || $sal_trns_dtl_amount==null ||
            $sal_trns_dtl_percentage == null ){
             alert("Please Provide All Salary Transaction Details and Then Try Again!");
             return false;
         }else{
             $salary_transctn_id = $sal_trans_id; // Salary Transaction ID

             var index = $.inArray( $arrayRnc);
             if (index>=0) {
                 alert("You already added this Salary Transaction in the below table");
                 // Also flash the existing text field
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
                      "<td><input type='hidden' name='salary_trn_hd_id[]' value='" + $sal_trans_id + "' readonly><input name='type[]' value='"+ $sal_trns_dtl_type +"' readonly></td>" +
                      "<td><input name='hr_salary_allowance_id[]' value='"+ $sal_trns_dtl_allowance +"' readonly> </td>" +
                      "<td><input name='hr_salary_deduction_id[]' value='"+ $sal_trns_dtl_deduction +"' readonly> </td>" +
                      "<td><input name='hr_over_time_id[]' value='"+ $sal_trns_dtl_ovrtm +"' readonly> </td>" +
                      "<td><input name='hr_bonus_id[]' value='"+ $sal_trns_dtl_bonus +"' readonly> </td>" +
                      "<td><input name='percentage[]' value='"+ $sal_trns_dtl_percentage +"' readonly></td>" +
                      "<td><input name='amount[]' value='"+ $sal_trns_dtl_amount +"' readonly></td>" +

                  " </tr>");

                 $arrayRnc.push($salary_transctn_id);

                 //flush the input fields
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

    // Delete : ok
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

     // Drop down change with input form and div
     $('#salary_transaction_detail_type').change(function(){
        selection = $(this).val();
        switch(selection)
        {
            case 'allowance':
                $('#allowanceType').show();
                $('#deductionType').hide();
                $('#bonusType').hide();
                $('#overTimeType').hide();
                break;

            case 'deduction':
                $('#deductionType').show();
                $('#allowanceType').hide();
                $('#bonusType').hide();
                $('#overTimeType').hide();
                break;

            case 'over-time':
                $('#overTimeType').show();
                $('#allowanceType').hide();
                $('#bonusType').hide();
                $('#deductionType').hide();
                break;

            case 'bonus':
                $('#bonusType').show();
                $('#allowanceType').hide();
                $('#overTimeType').hide();
                $('#deductionType').hide();
                break;

            default:
                $('#bonusType').hide();
                $('#allowanceType').hide();
                $('#overTimeType').hide();
                $('#deductionType').hide();
                break;
        }
     });

     // Selection change with form
     $('.std_percentage').change(function(){
           var a = $('.std_percentage').val();

           var b = document.getElementById("salary-data").value;
           var amount = document.getElementById('salary_transaction_detail_amount');;
           var myResult = (a*b)/100;
           amount.value = myResult;

           $('.std_amount').prop('disabled', true);
     });


     $('.std_amount').change(function(){

           var a = $('.std_amount').val();
           var b = document.getElementById("salary-data").value;
           var percentage = document.getElementById('salary_transaction_detail_percentage');;
           var myResult = (a*100)/b;
           percentage.value = myResult;

           $('.std_percentage').prop('disabled', true);
     });

//  dynamic dynamic

     $('.shafi').change(function(){
              type = $(".shafi_type").val();
             switch(type)
             {
                 case 'allowance':
                     $.get(type == "allowance" ? "{{ url('hr/sal-allowance/amount') }}" : null ,
                     { id: $(this).val() },
                     function(data) {
                          $('#salary-data').val(data);
                     });
                     break;

                 case 'deduction':
                     $.get(type == "deduction" ? "{{ url('hr/sal-deduction/amount') }}" : null ,
                     { id: $(this).val() },
                     function(data) {
                           $('#salary-data').val(data);
                     });
                     break;

                 case 'over-time':
                     $.get(type == "over-time" ? "{{ url('hr/sal-overtime/amount') }}" : null ,
                     { id: $(this).val() },
                     function(data) {
                           $('#salary-data').val(data);
                     });
                     break;

                 case 'bonus':
                     $.get(type == "bonus" ? "{{ url('hr/sal-bonus/amount') }}" : null ,
                     { id: $(this).val() },
                     function(data) {
                           $('#salary-data').val(data);
                     });
                     break;
             }
          });

});
</script>