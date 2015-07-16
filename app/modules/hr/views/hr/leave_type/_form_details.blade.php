<style>
    input{ border-color: 1px solid #efefef; }
    #test input { border: none; width: 100%; }
</style>

<div class="row">
    <div class="ok-123" id="show_data">
        <div class="col-sm-2" style="width:37%">
            <div class='form-group'>
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', Input::old('title'),['class'=>'form-control']) }}
            </div>
        </div>

        <div class="col-sm-2" style="width:28%">
            <div class='form-group'>
                {{ Form::label('code', 'Code') }}
                {{ Form::text('code', Input::old('code'),['class'=>'form-control']) }}
            </div>
        </div>

        <div class="col-sm-2" style="width:25%">
            {{ Form::label('employee_type', 'Employee Type') }}
            <div>{{ Form::select ('employee_type',  array('' => 'Select one',
                'permanent' => 'Permanent', 'full-time' => 'Full Time','part-time'=>'Part Time','contractual'=>'Contractual','project'=>'Project'), Input::old('employee_type'),
                 array('class' => 'form-control ')) }}
            </div>
        </div>

        <span class="pull-left" id="something-added" style="color:lightcoral; font-weight: bold"></span>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <div class="pull-left">
            <div class='form-group' style="margin-left: 200px">
                <input type="button" class="btn-xs btn-linkedin" id="add-leave-type" value="+Add" style="width: 70px">
            </div>
        </div>
    </div>

{{ Form::open(['route'=>'leave-type.store']) }}
    {{---------------Update---------------------------------------------------------------------------------------------------}}
    <div style="display: none;" class="ok-456">
        <table>
            <thead>
            <th class="col-sm-2">Title</th>
            <th class="col-sm-2">code</th>
            <th class="col-sm-2">Employee Type</th>
            </thead>
            <tbody class="view">

            </tbody>
        </table>
        <p>&nbsp;</p>
        <div class="">
            <div class='form-group' style="margin-right: 4px">
                {{ Form::submit('Update', ['class'=>'pull-right btn-sm btn-info']) }}
            </div>
        </div>
    </div>
    {{--------------------Update:End--------------------------------------------------------------------------------------------------}}

    {{-------------------- HR Provident Fund Config List --------------------------------------------------------------------------------}}
    <br><br>
    <div class="table-hide">
        <p>
        <h5 style="text-align: center;color: royalblue"><b>HR Leave Type</b></h5>
            <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold">
            </span>
        </p>
        <table class="table table-bordered small-header-table">
            <thead>
            <th>Title</th>
            <th>Code</th>
            <th>Employee Type</th>
            <th width="100px">Action</th>
            </thead>

            <tbody id="test">

            </tbody>

            <tbody>
            <?php $counter = 0;?>
            @foreach($model as $values)
            <tr>
                <td class="leave_type_id" hidden="hidden">{{$values->id }}</td>
                <td class="title">{{$values->title}}</td>
                <td class="code">{{$values->code}}</td>
                <td class="employee_type">{{Str::title($values->employee_type)}}</td>
                <td>
                    <a class="btn btn-xs btn-default lt-edit type" href="{{$values->id}}" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                    <a data-href="{{ $values->id }}" class="btn btn-default btn-xs delete-dt-2" id="delete-dt-2{{ $values->id }}" ><i class="fa fa-trash-o" style="font-size: 12px;color: lightcoral"></i></a>
                </td>
            </tr>
            <?php $counter++;?>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
            {{ Form::submit('Save', ['class'=>'btn btn-xs btn-info' ,'style'=>"width: 60px"]) }}
            <button class="btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        </div>
    </div>
    {{ Form::close() }}
</div>
<p>&nbsp;</p>

@include('hr::hr.leave_type._script')
{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}


