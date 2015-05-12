
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center;"> INFORMATION OF <span style="color: seagreen">
    {{isset($exam_data->relAcmMarksDistItem['title']) ? $exam_data->relAcmMarksDistItem['title'] : ''}},
    {{isset($exam_data->relCourseConduct->relCourse->title) ? $exam_data->relCourseConduct->relCourse->title :''}}</span>
    </h4>
</div>

<div class="modal-body">
     <div style="padding: 30px;">
           <table id="" class="table table-bordered table-hover table-striped" style="font-size: medium">
               <tr>
                  <th class="col-lg-6">Title :</th>
                  <td>{{isset($exam_data->title) ? $exam_data->title : '' }}</td>
               </tr>

               <tr>
                  <th class="col-lg-6">Exam Type :</th>
                  <td>{{isset($exam_data->relAcmMarksDistItem['title']) ? $exam_data->relAcmMarksDistItem['title'] : ''}}</td>
               </tr>

               <tr>
                  <th class="col-lg-6">Year :</th>
                  <td>{{isset($exam_data->relYear['title']) ? $exam_data->relYear['title'] : ''}}</td>
               </tr>

               <tr>
                  <th class="col-lg-6">Semester :</th>
                  <td>{{isset($exam_data->relSemester['title']) ? $exam_data->relSemester['title'] : ''}}</td>
               </tr>

               <tr>
                  <th class="col-lg-6">Course Name :</th>
                  <td>{{isset($exam_data->relCourseConduct->relCourse->title) ? $exam_data->relCourseConduct->relCourse->title :''}}</td>
               </tr>
           </table>

           <p>&nbsp;</p>
           <a href="" class="pull-right btn btn-bitbucket btn-xs" span class="glyphicon-refresh">Close</a>
           <p>&nbsp;</p>
     </div>
</div>
