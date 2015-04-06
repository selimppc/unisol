<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Show Activities</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'applicant/extra_curricular/show/','method' => '')) }}
        <div class="box-body table-responsive ">
            <table class="table table-striped  table-bordered">
                <tr>
                    <th>Title:</th>
                    <td>{{ $datas->title }}</td>
                </tr>
                <tr>
                    <th> Description:</th>
                    <td>{{ $datas->description }}</td>
                </tr>
                <tr>
                    <th> Achievement:</th>
                    <td>{{ $datas->achievement }}</td>
                </tr>
                <tr>
                    <th>Certificate Medal</th>
                    <td>{{ HTML::image('/applicant_images/extra_curri_act/'.$datas->certificate_medal, $datas->certificate_medal,['class'=>'col-md-3'])}}</td>
                </tr>
            </table>
        </div>
        {{ Form::close() }}
    </div>
</div>

<div class="modal-footer">
    <a href="{{URL::to('applicant/extra_curricular/')}}" class="btn btn-default">Close </a>
</div>