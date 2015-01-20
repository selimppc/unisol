<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title">Show Course Item config</h4>
</div>
<div class="modal-body">

    {{ Form::open(array('url'=>'amw/config/index','method' => '', 'class'=>'form-horizontal')) }}
        <p> Total Marks: {{ $datas->evaluation_total_marks}}</p>
        <div class="form-group">
            {{ Form::hidden('course_id', $datas->id, ['class'=>'form-control'])}}
            {{ Form::hidden('course_title', $datas->title, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
           <div class="col-md-8">
                {{ Form::select('acm_marks_dist_item_id', [''=>'Select Option'] + AcmMarksDist::orderBy('title')->lists('title', 'id'),Input::old('acm_marks_dist_item_id'), ['class'=>'form-control']) }}
           </div>
           <div class="col-md-4">
               {{ Form::submit('ADD', ['class'=>'btn btn-info']) }}
           </div>
        </div>
    {{ Form::close() }}

    <table class="table table-bordered">
        <thead>
            <th>Item</th>
            <th>Marks (%)</th>
            <th>Read Only</th>
            <th>Default Item?</th>
            <th>Actual Marks</th>
            <th>Action</th>
        </thead>
        <tbody>
           {{Form::open()}}
            <tr>
                <td>Attendance</td>
                <td>{{ Form::text('marks_percent', Input::old('marks_percent'), ['class'=>'']) }}</td>
                <td>{{ Form::checkbox('is_readOnly[]', 1, true, ['class' => '']) }}</td>
                <td>{{ Form::radio('is_default[]', 1, true, ['class' => '']) }}</td>
                <td>10</td>
                <td><a class="btn btn-sm btn-default" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a></td>
            </tr>
           {{Form::close()}}
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <a href="{{URL::to('amw/config/index')}}" class="btn btn-default">Close </a>
</div>