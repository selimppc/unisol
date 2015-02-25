
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Time Constraint </h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

          {{ Form::open(['route' => ['deg_waiver_const.store'], 'class'=>'form-horizontal','files' => true,]) }}

          {{Form::hidden('degree_waiver_id', $degree_waiver_id)}}
          {{ Form::label('start_date', 'Start Time') }}
          {{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control datepicker','required'=>'required']) }}

          <p>&nbsp;</p>

          {{ Form::label('end_date', 'End Time') }}
          {{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control datepicker','required'=>'required'])  }}

           <p>&nbsp;</p>

           <p>&nbsp;</p>
           <p>&nbsp;</p>

         {{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary')) }}

          <p>&nbsp;</p>

         <p>&nbsp;</p>
        {{Form::close()}}

    </div>

</div>
{{--<script>--}}
{{--$('.datepicker').datepicker({--}}
    {{--format: 'yyyy/mm/dd'--}}

{{--});--}}
{{--</script>--}}

    {{--$('.datepicker').datepicker().on('changeDate', function (ev) {--}}


        {{--var $picker = $(this);--}}
        {{--$picker.datepicker();--}}
        {{--$picker.datepicker('hide');--}}


{{--});--}}

{{--</script>--}}
{{--<script>--}}

{{--$('.datepicker').each(function() {--}}
{{--//    var minDate = new Date();--}}
{{--//    minDate.setYear(0000);--}}
{{--//    minDate.setMonth(00);--}}
{{--//    minDate.setDate(00);--}}

    {{--var $picker = $(this);--}}
    {{--$picker.datepicker();--}}

    {{--var pickerObject = $picker.data('datepicker');--}}

    {{--$picker.on('changeDate', function(ev){--}}
        {{--$picker.datepicker('hide');--}}
    {{--});--}}
{{--});--}}

{{--</script>--}}


<script>
//$(document).ready(function(){

        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd'

        });

        $('.datepicker').each(function() {

            var $picker = $(this);
            $picker.datepicker();

            var pickerObject = $picker.data('datepicker');

            $picker.on('changeDate', function(ev){
                $picker.datepicker('hide');
            });
        });

//});
</script>