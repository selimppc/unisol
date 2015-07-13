
<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>
<script>

$(".edit-pvd-config").click(function(event){
          var $row = $(this).closest("tr");
          $data_1 = $row.find(".et").text();
          $data_2 = $row.find(".ca").text();
          $data_3 = $row.find(".cc_0").text();
          $data_4 = $row.find(".cc_25").text();
          $data_5 = $row.find(".cc_50").text();
          $data_6 = $row.find(".cc_75").text();
          $data_7 = $row.find(".cc_100").text();
          $id = $row.find(".config-id").text();

          $(".ok-456").show();
          /*$('#1').html($data_1);
          $('#2').html($data_2);
          $('#3').html($data_3);
          $('#4').html($data_4);
          $('#5').html($data_5);*/
//                   $('#new-value-123').val($data_1);
//                   $('#new-value-132').val($data_2);
        $('.view').html("<tr> " +"" +
         "<td hidden='hidden'><input name='' value='"+ $id +"'> </td>"+
         "<td ><input name='' value='"+ $data_1 +"'> </td>" +
         "<td ><input name='' value='"+ $data_2 +"'> </td>" +
         "<td ><input name='' value='"+ $data_3 +"'> </td>" +
         "<td ><input name='' value='"+ $data_4 +"'> </td>" +
         "<td ><input name='' value='"+ $data_5 +"'> </td>" +
         "<td ><input name='' value='"+ $data_6 +"'> </td>" +
         "<td ><input name='' value='"+ $data_7 +"'> </td>" +
         "</tr>");
 	 });

</script>
<div class="row">

   <div class="ok-123" id="show_data">
        <div class="col-sm-2" style="width:12%">
        {{Form::hidden('id',Input::old('id'))}}
            <div class='form-group'>
               {{ Form::label('employee_type', 'Employee Type') }}<br><br>
               <input type="text" name="employee_type" value="Permanent" readonly style="background-color: #efefef" class="form-control">
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
        <div class="pull-right">
             <div class='form-group' style="margin-right: 4px">
                <input type="button" class="btn-xs btn-linkedin" id="add-pvd-config" value="+Add">
             </div>
        </div>
   </div>

   {{---------------Update---------------------------------------------------------------------------------------------------}}
   {{ Form::open(array('route'=>'update','method' => 'POST')) }}
    {{--{{ Form::open(array('url' => 'hr/update')) }}--}}
   <div style="display: none;" class="ok-456">

        <table>
            <thead>
                {{--<th class="col-sm-2">id</th>--}}
                <th class="col-sm-2">Employee Type</th>
                <th class="col-sm-2">Contribution Amount</th>
                <th class="col-sm-2">Company Contribution 0</th>
                <th class="col-sm-2">Company Contribution 25</th>
                <th class="col-sm-2">Company Contribution 50</th>
                <th class="col-sm-2">Company Contribution 75</th>
                <th class="col-sm-2">Company Contribution 100</th>
            </thead>
                <tbody class="view">

                </tbody>
        </table>
        <p>&nbsp;</p>
        <div class="pull-right">
           <div class='form-group' style="margin-right: 4px">
              {{ Form::submit('Update', array('class'=>'pull-right btn-sm btn-info' ,'id'=>"btn-update")) }}
           </div>
        </div>

   </div>
{{ Form::close() }}
   {{--------------------Update:End--------------------------------------------------------------------------------------------------}}

   {{-------------------- HR Provident Fund Config List --------------------------------------------------------------------------------}}
   <br><br>
    <div class="table-hide">
        <p>
            <h5 style="text-align: center;color: royalblue"><b>HR Provident Fund Config List</b></h5>
            <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold">
            </span>
        </p>
        <span class="pull-left" style="color: teal; font-weight: bold">CC = Company Contribution</span>
        <table class="table table-bordered small-header-table">
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
                       <td class="config-id" hidden="hidden">{{$values->id }}></td>
                       <td class="et">{{ucfirst($values->employee_type)}}</td>
                       <td class="ca">{{$values->contribution_amount}}</td>
                       <td class="cc_0">{{round($values->company_contribution_0, 0)}}</td>
                       <td class="cc_25">{{round($values->company_contribution_25, 0)}}</td>
                       <td class="cc_50">{{round($values->company_contribution_50, 0)}}</td>
                       <td class="cc_75">{{round($values->company_contribution_75, 0)}}</td>
                       <td class="cc_100">{{round($values->company_contribution_100, 0)}}</td>
                       <td class="config-id">
                           <a class="btn btn-xs btn-default edit edit-pvd-config" href="{{$values->id}}" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
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
     $("#add-pvd-config").click(function(event){

         $config_id = $("#id").val();
         $employee_type = $("#employee_type").val();
         $contribution_amount = $("#contribution_amount").val();
         $company_contribution_0 = $("#company_contribution_0").val();
         $company_contribution_25 = $("#company_contribution_25").val();
         $company_contribution_50 = $("#company_contribution_50").val();
         $company_contribution_75 = $("#company_contribution_75").val();
         $company_contribution_100 = $("#company_contribution_100").val();

         $('#test').append("<tr> " +
              "<td><input name='id' value='"+ $config_id +"' readonly> </td>" +
              "<td><input name='employee_type' value='Permanent' readonly> </td>" +
              "<td><input name='contribution_amount' value='"+ $contribution_amount +"' readonly> </td>" +
              "<td><input name='company_contribution_0' value='"+ $company_contribution_0 +"' readonly> </td>" +
              "<td><input name='company_contribution_25' value='"+ $company_contribution_25 +"' readonly> </td>" +
              "<td><input name='company_contribution_50' value='"+ $company_contribution_50 +"' readonly></td>" +
              "<td><input name='company_contribution_75' value='"+ $company_contribution_75 +"' readonly></td>" +
              "<td><input name='company_contribution_100' value='"+ $company_contribution_100 +"' readonly></td>" +
              "<td></td>"+
         "</tr>");
 	 });

 	 //edit
 	  /*$('#btn-update').click(function(e) {
//alert('ok');

             $.ajax({
                 url: 'provident-fund.show',
                 dataType: 'json'

             });return false;
          });*/

    //delete
     $('.delete-dt-2').click(function(e) {
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
 });

</script>

<script>
$(function(){
     $('.edit').click(function() {
        $(".ok-123").hide();
//        $(".ok-456").show();
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

