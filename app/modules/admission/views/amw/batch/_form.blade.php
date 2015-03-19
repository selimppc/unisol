<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Batch</h4>
</div>


{{ HTML::style('assets/etsb/etsb_css/bootstrap/bootstrap.min.css') }}
{{ HTML::style('assets/etsb/etsb_css/datepicker/datepicker.css') }}
{{ HTML::script('assets/js/jquery-2.1.1.min.js') }}
{{ HTML::script('assets/etsb/etsb_js/bootstrap/bootstrap.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/datepicker/bootstrap-datepicker.min.js')}}
<script type="text/javascript">
            $(function() {
                $('.date-picker').each(function() {

                    var $picker = $(this);
                    $picker.datepicker({
                        format:'yyyy-mm-dd'
                    });
                    var pickerObject = $picker.data('date-picker');

                    $picker.on('changeDate', function(ev){
                        $picker.datepicker('hide');
                    });
                });
            });
</script>


<div class="modal-body">
     <div style="padding: 20px;">
        {{Form::open(array('url'=>'admission/amw/store', 'class'=>'form-horizontal','files'=>true))}}

                <div class='form-group'>
                           {{ Form::label('degree_id', 'Degree') }}
                           {{ Form::select('degree_id',$dpg_list,null,['class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('year_id', 'Year') }}
                           {{ Form::select('year_id',$year_list,null,['class'=>'form-control']) }}
                </div>

                 <div class='form-group'>
                           {{ Form::label('semester_id', 'Semester') }}
                           {{ Form::select('semester_id',$semester_list,null,['class'=>'form-control']) }}
                 </div>

                <div class='form-group'>
                           {{ Form::label('description', 'Description') }}
                           {{ Form::textarea('description', Input::old('description'),['size' => '30x5','class'=>'form-control','required'=>'required']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('batch_number', 'Batch Number') }}
                           {{ Form::text('batch_number', Input::old('batch_number'),['class'=>'form-control','required'=>'required']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('seat_total', 'Total Seat') }}
                           {{ Form::text('seat_total', Input::old('seat_total'),['class'=>'form-control','required'=>'required']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('start_date', 'Start Date') }}
                           {{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control date-picker']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('end_date', 'End Date') }}
                           {{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control date-picker','required'=>'required']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('admission_deadline', 'Admission Deadline') }}
                           {{ Form::text('admission_deadline', Input::old('admission_deadline'),['class'=>'form-control date-picker','required'=>'required']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('admtest_date', 'Admission Test Date') }}
                           {{ Form::text('admtest_date', Input::old('admtest_date'),['class'=>'form-control date-picker','required'=>'required']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('admtest_start_time', 'Admission Test Start Time') }}
                           {{ Form::text('admtest_start_time', Input::old('admtest_start_time'),['class'=>'form-control','required'=>'required']) }}
                           {{--<input type="time" name="admtest_start_time" class="form-control"/>--}}
                </div>


              {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
              <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

              <p>&nbsp;</p>
        {{Form::close()}}
     </div>
</div>


