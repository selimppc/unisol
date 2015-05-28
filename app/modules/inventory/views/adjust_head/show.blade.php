<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> Transfer Number: {{ $data->transfer_number }}</h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h5><strong> Dispatch Head :</strong></h5>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Transfer TO:</strong></td>
            <td>{{ isset($data->transfer_to)? $data->relDepartment->title :''}}</td>
        </tr>
        <tr>
            <td><strong> Date:</strong></td>
            <td>{{ $data->date }}</td>
        </tr>

        <tr>
            <td><strong> Confirm Date</strong></td>
            <td>{{ $data->confirm_date }}</td>
        </tr>

        <tr>
            <td><strong> Note :</strong></td>
            <td>{{ $data->note }}</td>
        </tr>
        <tr>
            <td><strong> Status:</strong></td>
            <td>{{ $data->status }}</td>
        </tr>


    </table>

    </div>

<p>
    <b> Transfer Detail(s)</b>
</p>
    <div class="row">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th> Rate </th>
                    <th> Unit </th>
                    <th> Quantity </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($sd_dt))
                @foreach($sd_dt as $values)
                 <tr>
                    <td>{{Str::title($values->relInvProduct->title)}}</td>
                    <td>{{ $values->relInvProduct->code }}  </td>
                    <td>{{ $values->rate }}  </td>
                    <td>{{$values->unit}}</td>
                    <td>{{$values->quantity}}</td>
                 </tr>
                @endforeach
                @else
                    {{ "No Data Found !" }}
                @endif
            </tbody>

        </table>
    </div>

</div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>