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

        {{--This uploaded file will come from acm_academic_details table bt images will be come from public->file->item_class_file--}}
        <h3>Files: {{$datas->file}}</h3>
        {{--<ul class="row image_thumbs" style="list-style:none;">--}}
            {{--@foreach ($datas as $value)--}}
                {{--<li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">--}}
                    {{--<img src="{{URL::to('/')}}/file/thumbs/thumbs_{{$value->photos}}" data_description="{{URL::to('/')}}/file/user_photos/{{$value->photos}}" class="img-responsive" />--}}
                {{--</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}

    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::previous()}}" class="btn btn-default">Close</a>
</div>