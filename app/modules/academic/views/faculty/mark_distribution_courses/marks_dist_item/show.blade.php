<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size:large">Show Marks Distribution Item : {{isset($item_title->title)? $item_title->title :''}}
    </h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        <table id="" class="table table-bordered table-hover table-striped">
            @foreach($data as $value)
                <tr>
                    <td><strong>Title:</strong></td>
                    <td>
                        {{isset($value->title) ? $value->title : '' }}
                    </td>
                </tr>
                <tr>
                    <td><strong>Description:</strong></td>
                    <td>
                        {{isset($value->description) ? $value->description : '' }}
                    </td>
                </tr>
                <tr>
                    <td><strong>Status:</strong></td>
                    <td>
                        {{($value->status == 1) ? 'Active' : 'Inactive';}}
                    </td>
                </tr>
                <tr>
                    <td><strong>Date:</strong></td>
                    <td>
                        {{isset($value->relAcmClassSchedule->day) ? $value->relAcmClassSchedule->day : '' }}
                    </td>
                </tr>
                <tr>
                    <td><strong>Time:</strong></td>
                    <td>
                        {{isset($value->relAcmClassSchedule->relAcmClassTime->start_time) ? $value->relAcmClassSchedule->relAcmClassTime->start_time : ''}}- {{isset($value->relAcmClassSchedule->relAcmClassTime->end_time) ? $value->relAcmClassSchedule->relAcmClassTime->end_time :''}}
                    </td>
                </tr>
            @endforeach
        </table>
        <p><strong>Files ::</strong></p>
        @foreach($datas as $value)
            {{--{{ HTML::image('file/item_class_file/'.$value->file)}}--}}
            {{ HTML::image('file/item_class_file/'.$value->file, $value->file,['class'=>'col-md-3'])}}
        @endforeach

    </div>
    <div class="modal-footer">
        <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
    </div>
</div>

