<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> Student's Billing  </h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h5><strong> Student's Billing Summary</strong></h5>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Billing Schedule </strong></td>
            <td>{{ Str::title($bs_head->relBillingSchedule->title)}}</td>
        </tr>
        <tr>
            <td><strong> Total Cost </strong></td>
            <td>{{ $bs_head->total_cost }}</td>
        </tr>

        <tr>
            <td><strong> Status:</strong></td>
            <td>{{ $bs_head->status }}</td>
        </tr>

    </table>

    </div>

<p>
    <b> Student's Billing Details</b>
</p>
    <div class="row">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> Billing Item</th>
                    <th> Waiver(item) </th>
                    <th> Waiver Amount </th>
                    <th> Cost per Unit </th>
                    <th> Quantity </th>
                    <th> Line Amount </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($bs_dt))
                @foreach($bs_dt as $values)
                 <tr>
                    <td>{{Str::title($values->relBillingItem->title)}}</td>
                    <td>{{Str::title($values->relWaiver->title)}} </td>
                    <td>{{Str::title($values->relWaiver->amount)}} </td>
                    <td>{{$values->cost_per_unit}}</td>
                    <td>{{ $values->quantity }}  </td>
                    <td>{{$values->total_amount}}</td>
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