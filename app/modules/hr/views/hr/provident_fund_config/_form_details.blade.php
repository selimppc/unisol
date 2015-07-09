
<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>

<div class="row">
   <div class="pvd-form">
        <div class="col-sm-2" style="width:12%">
            <div class='form-group'>
               {{ Form::label('employee_type', 'Employee Type') }}<br><br>
               <input type="text" name="type" value="Permanent" readonly style="background-color: #efefef" class="form-control">
            </div>
        </div>

        <div class="col-sm-2" style="width:13%">
            <div class='form-group'>
               {{ Form::label('contribution_amount', 'Contribution Amount') }}
               {{ Form::text('contribution_amount', Input::old('contribution_amount'),['id'=>'contribution_amount','class'=>'form-control']) }}
            </div>
        </div>

        <div class="col-sm-2" style="width:14%">
            <div class='form-group'>
               {{ Form::label('company_contribution_0', 'Company Contribution 0') }}
               {{ Form::text('company_contribution_0', Input::old('company_contribution_0'),['id'=>'company_contribution_0','class'=>'form-control']) }}
            </div>
        </div>

        <div class="col-sm-2" style="width:14%">
            <div class='form-group'>
               {{ Form::label('company_contribution_25', 'Company Contribution 25') }}
               {{ Form::text('company_contribution_25', Input::old('company_contribution_25'),['id'=>'company_contribution_25','class'=>'form-control']) }}
            </div>
        </div>

        <div class="col-sm-2" style="width:14%">
            <div class='form-group'>
               {{ Form::label('company_contribution_50', 'Company Contribution 50') }}
               {{ Form::text('company_contribution_50', Input::old('company_contribution_50'),['id'=>'company_contribution_50','class'=>'form-control']) }}
            </div>
        </div>

        <div class="col-sm-2" style="width:14%">
            <div class='form-group'>
               {{ Form::label('company_contribution_75', 'Company Contribution 75') }}
               {{ Form::text('company_contribution_75', Input::old('company_contribution_25'),['id'=>'company_contribution_75','class'=>'form-control']) }}
            </div>
        </div>

        <div class="col-sm-2" style="width:14%">
            <div class='form-group'>
               {{ Form::label('company_contribution_100', 'Company Contribution 100') }}
               {{ Form::text('company_contribution_100', Input::old('company_contribution_100'),['id'=>'company_contribution_100','class'=>'form-control']) }}
            </div>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="pull-right">
             <div class='form-group' style="margin-right: 4px">
                <input type="button" class="btn-xs btn-linkedin" id="add-pvd-config" value="+Add">
             </div>
        </div>
        <p>&nbsp;</p>
   </div>

   {{---------------Update---------------------------------------------------------------------------------------------------}}
   <div style="display: none" class="pvd-update">
       {{--{{Form::model($model, array('route'=>['admission.public.update-applicant-profile'], 'class'=>'form-horizontal','files'=>true))}}--}}
        <div class="col-sm-2" style="width:12%">
           <div class='form-group'>
              {{ Form::label('employee_type', 'Employee Type') }}<br><br>
              <input type="text" name="type" value="Permanent" readonly style="background-color: #efefef" class="form-control">
           </div>
        </div>

        <div class="col-sm-2" style="width:13%">
           <div class='form-group'>
              {{ Form::label('contribution_amount', 'Contribution Amount') }}
              {{ Form::text('contribution_amount', Input::old('contribution_amount'),['id'=>'contribution_amount','class'=>'form-control']) }}
           </div>
        </div>

        <div class="col-sm-2" style="width:14%">
            <div class='form-group'>
              {{ Form::label('company_contribution_0', 'Company Contribution 0') }}
              {{ Form::text('company_contribution_0', Input::old('company_contribution_0'),['id'=>'company_contribution_0','class'=>'form-control']) }}
            </div>
        </div>

        <div class="col-sm-2" style="width:14%">
            <div class='form-group'>
              {{ Form::label('company_contribution_25', 'Company Contribution 25') }}
              {{ Form::text('company_contribution_25', Input::old('company_contribution_25'),['id'=>'company_contribution_25','class'=>'form-control']) }}
            </div>
        </div>

        <div class="col-sm-2" style="width:14%">
           <div class='form-group'>
              {{ Form::label('company_contribution_50', 'Company Contribution 50') }}
              {{ Form::text('company_contribution_50', Input::old('company_contribution_50'),['id'=>'company_contribution_50','class'=>'form-control']) }}
           </div>
        </div>

        <div class="col-sm-2" style="width:14%">
           <div class='form-group'>
              {{ Form::label('company_contribution_75', 'Company Contribution 75') }}
              {{ Form::text('company_contribution_75', Input::old('company_contribution_25'),['id'=>'company_contribution_75','class'=>'form-control']) }}
           </div>
        </div>

        <div class="col-sm-2" style="width:14%">
           <div class='form-group'>
              {{ Form::label('company_contribution_100', 'Company Contribution 100') }}
              {{ Form::text('company_contribution_100', Input::old('company_contribution_100'),['id'=>'company_contribution_100','class'=>'form-control']) }}
           </div>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="pull-right">
            <div class='form-group' style="margin-right: 4px">
               <input type="button" class="btn-xs btn-linkedin" id="add-pvd-config" value="+Add">
            </div>
        </div>
        <p>&nbsp;</p>
   </div>
        {{--{{ Form::close() }}--}}
   {{--------------------Update:End--------------------------------------------------------------------------------------------------}}

   {{-------------------- HR Provident Fund Config List --------------------------------------------------------------------------------}}
    <div class="table-hide">
        <p>
            <h5 style="text-align: center;color: royalblue"><b>HR Provident Fund Config List</b></h5>
            <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold">
            </span>
        </p>
        <span class="pull-left" style="color: teal; font-weight: bold">CC = Company Contribution</span>
        <table class="table table-bordered small-header-table" id="amwCourseConfig">
            <thead>
                <th>Employee Type</th>
                <th>Contribution Amount</th>
                <th>CC 0%</th>
                <th>CC 25%</th>
                <th>CC 50%</th>
                <th>CC 75%</th>
                <th>CC 100%</th>
                <th width="100px">Action</th>
            </thead>

            <tbody id="test">

            </tbody>

            <tbody>
              <?php $counter = 0;?>
               @foreach($model as $values)
                    <tr>
                       <td>{{ucfirst($values->employee_type)}}</td>
                       <td>{{$values->contribution_amount}}</td>
                       <td>{{round($values->company_contribution_0, 0)}}</td>
                       <td>{{round($values->company_contribution_25, 0)}}</td>
                       <td>{{round($values->company_contribution_50, 0)}}</td>
                       <td>{{round($values->company_contribution_75, 0)}}</td>
                       <td>{{round($values->company_contribution_100, 0)}}</td>
                       <td>
                           <a class="btn btn-xs btn-default edit" href=""  style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                           <a data-href="{{ $values->id }}" class="btn btn-default btn-xs delete-dt-2" id="delete-dt-2{{ $values->id }}" ><i class="fa fa-trash-o" style="font-size: 12px;color: lightcoral"></i></a>
                       </td>
                    </tr>
                    <?php $counter++;?>
               @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ Form::submit('Save', ['class'=>'btn btn-xs btn-success']) }}
            <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        </div>
    </div>
</div>
    <p>&nbsp;</p>

{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}

<script type="text/javascript">
$(function(){

     $tableItemCounter = 0; //To stop additem if exist
     var $arrayRnc = []; //To stop additem if exist

     $("#add-pvd-config").click(function(event){

         $employee_type = $("#employee_type").val();
         $contribution_amount = $("#contribution_amount").val();
         $company_contribution_0 = $("#company_contribution_0").val();
         $company_contribution_25 = $("#company_contribution_25").val();
         $company_contribution_50 = $("#company_contribution_50").val();
         $company_contribution_75 = $("#company_contribution_75").val();
         $company_contribution_100 = $("#company_contribution_100").val();

                $('#test').append("<tr> " +
//                      "<td><input type='hidden' name='hr_salary_transaction_id' value='" + $sal_trans_id + "' readonly><input name='type[]' value='"+ $sal_trns_dtl_type +"' readonly></td>" +
                      "<td><input name='employee_type' value='Permanent' readonly> </td>" +
                      "<td><input name='contribution_amount' value='"+ $contribution_amount +"' readonly> </td>" +
                      "<td><input name='company_contribution_0' value='"+ $company_contribution_0 +"' readonly> </td>" +
                      "<td><input name='company_contribution_25' value='"+ $company_contribution_25 +"' readonly> </td>" +
                      "<td><input name='company_contribution_50' value='"+ $company_contribution_50 +"' readonly></td>" +
                      "<td><input name='company_contribution_75' value='"+ $company_contribution_75 +"' readonly></td>" +
                      "<td><input name='company_contribution_100' value='"+ $company_contribution_100 +"' readonly></td>" +
                      "<td></td>"+
                  " </tr>");

//                 $arrayRnc.push($salary_transctn_id);

                 //flush the input fields
                 /*$("#salary_transaction_detail_amount").val("");
                 $("#salary_transaction_detail_percentage").val("");
                 $("#salary_transaction_detail_type").val("");
                 $("#salary_transaction_detail_over_time").val("");
                 $("#salary_transaction_detail_bonus").val("");
                 $("#salary_transaction_detail_allowance").val("");
                 $("#salary_transaction_detail_deduction").val("");*/

 	 });

    //delete
     $('.delete-dt-2').click(function(e) {
//     alert('ok');
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'provident-fund-config/delete',
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

     //edit
     /*$('.edit').click(function() {
         $(".pvd-form").hide();

       $(".pvd-update").show();
        return false;
     });*/

});

</script>

<script>
$( document ).ready(function() {
     $('.edit').click(function() {
       $(".pvd-form").hide();
       $(".pvd-update").show();
        return false;
     });
});
</script>

<div class="modal fade" id="pvd-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    </div>
  </div>
</div>

