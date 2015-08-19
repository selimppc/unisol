<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> View Supplier </h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h3><strong> Supplier Name :</strong>{{ $data->title }}</h3>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Code:</strong></td>
            <td>{{ $data->code}}</td>
        </tr>
        <tr>
            <td><strong> Company Name:</strong></td>
            <td>{{ $data->company_name }}</td>
        </tr>

        <tr>
            <td><strong> Address:</strong></td>
            <td>{{ $data->address }}</td>
        </tr>

        <tr>
            <td><strong> Country :</strong></td>
            <td>{{ $data->relCountry->title }}</td>
        </tr>
        <tr>
            <td><strong> Zip Code:</strong></td>
            <td>{{ $data->zip_code }}</td>
        </tr>

        <tr>
            <td><strong> Contact Person :</strong></td>
            <td>{{ $data->contact_person }}</td>
        </tr>
        <tr>
            <td><strong> Phone:</strong></td>
            <td>{{ $data->phone }}</td>
        </tr>

        <tr>
            <td><strong> Cell Phone:</strong></td>
            <td>{{ $data->cell_phone }}</td>
        </tr>
        <tr>
            <td><strong> Fax:</strong></td>
            <td>{{ $data->fax }}</td>
        </tr>

        <tr>
            <td><strong> Email :</strong></td>
            <td>{{ $data->email }}</td>
        </tr>
        <tr>
            <td><strong> Web:</strong></td>
            <td>{{ $data->web }}</td>
        </tr>

        <tr>
            <td><strong> Status:</strong></td>
            <td>{{ $data->status }}</td>
        </tr>

    </table>

    </div>

</div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>