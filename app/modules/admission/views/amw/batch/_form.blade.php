<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Batch: {{ $batch_number + 1 }} Of
    {{$degree_title->relDegreeLevel->code.''.$degree_title->relDegreeGroup->code.' On '.$degree_title->relDegreeProgram->code}}</h4>

</div>



<div class="modal-body">
     <div style="padding: 20px;">
        {{Form::open(array('url'=>'admission/amw/batch-store', 'class'=>'form-horizontal','files'=>true))}}
            {{Form::hidden('batch_number', $batch_number + 1)}}
            {{Form::hidden('degree_id', $degree_id)}}

            <div class='form-group'>


                <div class="col-sm-6" style="padding-right: 0;">
                    {{ Form::label('semester_id', 'Semester') }}
                   {{ Form::select('semester_id',$semester_list,null,['class'=>'form-control','onchange'=>"getStartDate()"]) }}
                </div>

                <div class="col-sm-6">
                    {{ Form::label('year_id', 'Year') }}
                   {{ Form::select('year_id',$year_list,null,['class'=>'form-control', 'id'=>'year-id', 'onchange'=>"getStartDate()"]) }}
                </div>
            </div>
            <br>


            {{--<div class='form-group'>
               {{ Form::label('batch_number', 'Batch Number') }}
               {{ Form::text('batch_number', Input::old('batch_number'),['class'=>'form-control','required'=>'required']) }}
            </div>--}}

            <div class='form-group'>
               {{ Form::label('description', 'Description') }}
               {{ Form::textarea('description', Input::old('description'),['size' => '30x5','class'=>'form-control']) }}
            </div>

            <div class='form-group'>
               {{ Form::label('seat_total', 'Total Seat') }}
               {{ Form::text('seat_total', Input::old('seat_total'),['class'=>'form-control','required'=>'required']) }}
            </div>

            <div class='form-group'>
               {{ Form::label('start_date', 'Start Date') }}
               {{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control date_picker', 'id'=>'start-date']) }}
            </div>

            <div class='form-group'>
               {{ Form::label('end_date', 'End Date') }}
               {{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control date_picker', 'id'=>'end-date', 'required'=>'required']) }}
            </div>

            <div class='form-group'>
               {{ Form::label('admission_deadline', 'Admission Deadline') }}
               {{ Form::text('admission_deadline', Input::old('admission_deadline'),['id'=>'adm-deadline','class'=>'form-control date_picker','required'=>'required']) }}
            </div>

            <div class='form-group'>
               {{ Form::label('admtest_date', 'Admission Test Date') }}
               {{ Form::text('admtest_date', Input::old('admtest_date'),['id'=>'adm-test-date','class'=>'form-control date_picker','required'=>'required']) }}
            </div>

            <div class='form-group'>
               {{ Form::label('admtest_start_time', 'Admission Test Start Time') }}
               {{ Form::Select('admtest_start_time', array('Select Any Time'=>'','09:00'=>'09:00','10:00'=>'10:00','11:00'=>'11:00','12:00'=>'12:00','03:00'=>'03:00','04:00'=>'04:00'),
                Input::old('admtest_start_time'),['class'=>'form-control ','required'=>'required']) }}
            </div>

            {{Form::hidden('status', 1)}}
            {{Form::hidden('duration', $duration,['id'=>'duration-year'])}}
             {{Form::hidden('adm_test_date', 1,['id'=>'adm_test_date'])}}

            <script>
                function getStartDate(){
                    var duration = document.getElementById("duration-year").value;
                    var y = document.getElementById("year-id");
//                    var s = document.getElementById("semester-id");
                    var year = y.options[y.selectedIndex].text;
//                    var semester = s.options[s.selectedIndex].text;

                    var start_date = ( parseInt(year) )+"-01-12";
                    var end_date = (parseInt(year) + parseInt(duration))+"-01-25";

                    document.getElementById("start-date").value = start_date;
                    document.getElementById("end-date").value = end_date;


                    var adm_deadline = new Date()
                    var month1 = adm_deadline.getMonth() + 1
                    var day1 = adm_deadline.getDate()
                    var year1 = adm_deadline.getFullYear()

                    var adm_test_date = new Date();
                    var month2 = adm_deadline.getMonth() + 1
                    var day2 = adm_deadline.getDate()
                    var year2 = adm_deadline.getFullYear()

                    document.getElementById("adm-deadline").value = year1 +"-"+ (month1+1) + "-" + day1 ;
                    document.getElementById("adm-test-date").value = year2 +"-"+ (month2+1) + "-" + (day2+10) ;

                }

//                function addDays(){
//                  var dt = new Date();
//                  dt.setDate(dt.getDate() + 15);
//                  alert(dt);
//                 }
            </script>


          {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
          {{--<button id="dateBtn" onclick="addDays()">--}}
           {{--Add more 15 days from today!--}}
          {{--</button>--}}
          <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

          <p>&nbsp;</p>
        {{Form::close()}}
     </div>
</div>
{{ HTML::script('assets/js/custom.js')}}

