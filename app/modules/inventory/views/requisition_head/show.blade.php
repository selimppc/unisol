<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> Requisition Number: {{ $data->requisition_no }}</h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h5><strong> Requisition Head :</strong></h5>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Supplier Name:</strong></td>
            <td>{{ $data->inv_supplier_id}}</td>
        </tr>
        <tr>
            <td><strong> Date:</strong></td>
            <td>{{ $data->date }}</td>
        </tr>

        <tr>
            <td><strong> Note:</strong></td>
            <td>{{ $data->note }}</td>
        </tr>

        <tr>
            <td><strong> Requisition Type :</strong></td>
            <td>{{ $data->requisition_type }}</td>
        </tr>
        <tr>
            <td><strong> Status:</strong></td>
            <td>{{ $data->status }}</td>
        </tr>


    </table>

    </div>


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
                @if(isset($req_dt))
                @foreach($req_dt as $values)
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