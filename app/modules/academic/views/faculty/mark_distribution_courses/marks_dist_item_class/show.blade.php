<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Show class</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">


        <h3> Class Title: {{$data->title}}</h3>
        <h3> Description: {{$data->description}}</h3>
        <h3> Status: {{($data->status == 1) ? 'Active' : 'Inactive';}}</h3>
        <h3> Class date:  {{$data->relAcmClassSchedule->day}}</h3>
        {{--<h3> Start Time:  {{$data->relAcmClassSchedule->relAcmClassTime->start_time}}</h3>--}}
        {{--<h3> End Time:  {{$data->relAcmClassSchedule->relAcmClassTime->end_time}}</h3>--}}


        {{--<h3>Files: {{$datas->file}}</h3>--}}


    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::previous()}}" class="btn btn-default">Close</a>
</div>