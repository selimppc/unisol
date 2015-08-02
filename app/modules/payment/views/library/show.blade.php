<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> Library Transaction </h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h5><strong> Library Transaction Summary :</strong></h5>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> LIb TRN NO # </strong></td>
            <td>{{ $lib_head->lib_trn_no}}</td>
        </tr>
        <tr>
            <td><strong> Library User </strong></td>
            <td>{{ $lib_head->user_id }}</td>
        </tr>


        <tr>
            <td> <strong> Total Amount </strong> </td>
            <td>{{ $lib_head->total_amount }}</td>
        </tr>

        <tr>
            <td><strong> Status</strong></td>
            <td>{{ $lib_head->status }}</td>
        </tr>

    </table>

    </div>

<p>
    <b> Library Transaction Detail(s) </b>
</p>
    <div class="row">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> TRN Type </th>
                    <th> Amount </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($lib_dt))
                @foreach($lib_dt as $values)
                 <tr>
                    <td>{{ Str::title($values->trn_type) }} </td>
                    <td>{{ $values->amount }}</td>
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