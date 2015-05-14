<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> View Product </h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h3><strong> Product Name :</strong>{{ $data->title }}</h3>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Code:</strong></td>
            <td>{{ $data->code}}</td>
        </tr>
        <tr>
            <td><strong> Title:</strong></td>
            <td>{{ $data->title }}</td>
        </tr>

        <tr>
            <td><strong> Description:</strong></td>
            <td>{{ $data->description }}</td>
        </tr>

        <tr>
            <td><strong> Image:</strong></td>
            <td>{{ $data->image }}</td>
        </tr>
        <tr>
            <td><strong> Product Class:</strong></td>
            <td>{{ $data->product_class }}</td>
        </tr>

        <tr>
            <td><strong> Product Category:</strong></td>
            <td>{{ $data->relInvProductCategory->title }}</td>
        </tr>
        <tr>
            <td><strong> Cost Price:</strong></td>
            <td>{{ $data->cost_price }}</td>
        </tr>

        <tr>
            <td><strong> Purchase Unit:</strong></td>
            <td>{{ $data->purchase_unit }}</td>
        </tr>
        <tr>
            <td><strong> Purchase Unit QTY:</strong></td>
            <td>{{ $data->purchase_unit_quantity }}</td>
        </tr>

        <tr>
            <td><strong> Stock Unit :</strong></td>
            <td>{{ $data->stock_unit }}</td>
        </tr>
        <tr>
            <td><strong> Stock Unit QTY:</strong></td>
            <td>{{ $data->stock_unit_quantity }}</td>
        </tr>

        <tr>
            <td><strong> Stock Type:</strong></td>
            <td>{{ $data->stock_type }}</td>
        </tr>

    </table>

    </div>

</div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>