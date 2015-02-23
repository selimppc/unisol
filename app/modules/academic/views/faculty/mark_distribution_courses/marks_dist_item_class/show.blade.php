<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title">Show class</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">

        @foreach($data as $value)
        <h3> Class Title: {{$value->title}}</h3>
        <h3> Description: {{$value->description}}</h3>
        <h3> Status: {{($value->status == 1) ? 'Active' : 'Inactive';}}</h3>
        <h3> Class date:  {{$value->relAcmClassSchedule->day}}</h3>
        <h3> Time:  {{$value->relAcmClassSchedule->relAcmClassTime->start_time}}- {{$value->relAcmClassSchedule->relAcmClassTime->end_time}}</h3>
        @endforeach
        @foreach($datas as $value)
            {{ HTML::image('file/item_class_file/'.$value->file, $value->file,['class'=>'col-md-3'])}}
        @endforeach

    </div>
    <div class="modal-footer">
        <a href="{{URL::previous()}}" class="btn btn-default" style="margin-top: 20px">Close</a>
    </div>
</div>
