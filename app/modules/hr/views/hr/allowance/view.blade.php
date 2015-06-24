<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> View Allowance </h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h3>Allowance Name : <strong style="color: #002a80">{{ ucfirst($data->title) }}</strong> </h3>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Code:</strong></td>
            <td>{{ ucfirst($data->code) }}</td>
        </tr>
        <tr>
            <td><strong> Description:</strong></td>
            <td>{{ ucfirst($data->description) }}</td>
        </tr>

    </table>

    </div>

</div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>