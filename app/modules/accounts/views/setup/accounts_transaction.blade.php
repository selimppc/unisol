<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> Accounts Transaction Setup </h4>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body" >

<div class="row">

    <div class="box box-solid ">
        <div class="col-sm-5">
            {{Form::open(['route'=> ['create-accounts-transaction'], 'role' => 'form', 'files' => true,])}}

            <div class='form-group'>
               {{ Form::label('code', 'Transaction Code') }}
               {{ Form::text('code', Input::old('code'),['class'=>'form-control', 'required', 'style'=>'text-transform: uppercase;']) }}
            </div>
            <div class='form-group'>
               {{ Form::label('title', 'Title') }}
               {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required']) }}
            </div>
            <div class='form-group'>
               {{ Form::label('last_number', 'Last Number') }}
               {{ Form::text('last_number', Input::old('last_number'), ['class'=>'form-control']) }}
            </div>

            <div class='form-group'>
               {{ Form::label('increment', 'Increment') }}
               {{ Form::text('increment', Input::old('increment'),['class'=>'form-control', 'required']) }}
            </div>

            {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
            <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

            <p>&nbsp;</p>

            {{ Form::close() }}
        </div>
        <div class="pull-right col-sm-6">
            <div>
                <h4> List of Transaction Setup </h4>
            </div>
            <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> Code </th>
                    <th> Title </th>
                    <th> Last Number </th>
                    <th> Increment </th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                <tr>
                    <td>{{ $values->code }}  </td>
                    <td>{{ $values->title }}</td>
                    <td>{{ $values->last_number }}</td>
                    <td>{{ $values->increment }}</td>
                 </tr>
                @endforeach
            </tbody>

        </table>

        </div>

    </div>
</div>



</div>
</div>