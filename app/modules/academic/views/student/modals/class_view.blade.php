
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center;"> INFORMATION OF <span style="color: seagreen">{{strtoupper($model->title)}}</span> </h4>
</div>

<div class="modal-body">
     <div style="padding: 30px;">
           {{--<div class="span9 well">--}}
               <table id="" class="table table-bordered table-hover table-striped" style="font-size: medium">

                   <tr>
                      <th class="col-lg-6">Title :</th>
                      <td>{{ $model->title }}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Description :</th>
                      <td>{{ $model->description }}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Class Time :</th>
                      <td>
                         Start Time :  {{$model->relAcmClassSchedule->relAcmClassTime->start_time}}<br>
                         End Time   :  {{$model->relAcmClassSchedule->relAcmClassTime->end_time}}<br>
                         Date       :  {{ isset($model->relAcmClassSchedule->day) ? $model->relAcmClassSchedule->day : '' }}
                      </td>
                   </tr>

               </table>
           {{--</div>--}}
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>