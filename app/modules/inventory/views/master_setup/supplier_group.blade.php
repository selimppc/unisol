<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> Supplier Group </h4>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body" >

<div class="row">

    <div class="box box-solid ">
        <div class="col-sm-6">
            {{Form::open(['route'=> ['create-supplier-group'], 'method' => 'patch', 'role' => 'form', 'files' => true,])}}
            {{ Form::hidden('id', 1) }}

            <div class='form-group'>
               {{ Form::label('type', 'Type') }}
               <input type="text" name="type" value="Supplier Group" readonly style="background-color: #efefef" class="form-control">
            </div>
            <div class='form-group'>
               {{ Form::label('code', 'Code') }}
               {{ Form::text('code', Input::old('code'),['class'=>'form-control', 'required', 'style'=>'text-transform: uppercase;']) }}
            </div>
            <div class='form-group'>
               {{ Form::label('description', 'Description') }}
               {{ Form::textarea('description', Input::old('description'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x2', 'class'=>'form-control']) }}
            </div>
            <div class='form-group'>
               {{ Form::label('account_code', 'Account Code') }}
               {{ Form::text('account_code', Input::old('account_code'),['class'=>'form-control', 'required']) }}
            </div>
            <div class='form-group'>
               {{ Form::label('account_disc', 'Account DISC') }}
               {{ Form::text('account_disc', Input::old('account_disc'),['class'=>'form-control', 'required']) }}
            </div>

            {{ Form::hidden('status', 'active') }}
            {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
            <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

            <p>&nbsp;</p>

            {{ Form::close() }}
        </div>
        <div class="pull-right col-sm-6">
            <div>
                <h4> List of Group </h4>
            </div>
            <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> Type: </th>
                    <th> Code </th>
                    <th> A/C Code </th>
                    <th> Status </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                    <td>{{ $values->type }}  </td>
                    <td>{{$values->code}}</td>
                    <td>{{$values->account_code}}</td>
                    <td>{{$values->status}}</td>
                 </tr>
                @endforeach
            </tbody>

        </table>

        </div>

    </div>
</div>



</div>
</div>