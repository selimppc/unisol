<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title text-center text-purple">View {{isset($view_summary_student->relUser->relUserProfile->first_name)?$view_summary_student->relUser->relUserProfile->first_name:''}} {{isset($view_summary_student->relUser->relUserProfile->last_name)?$view_summary_student->relUser->relUserProfile->last_name:''}}'s Billing Summary </h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>Applicant Name:</td>
                <td>
                    {{isset($view_summary_student->relUser->relUserProfile->first_name)?$view_summary_student->relUser->relUserProfile->first_name:''}} {{isset($view_summary_student->relUser->relUserProfile->last_name)?$view_summary_student->relUser->relUserProfile->last_name:''}}
                </td>
            </tr>
            <tr>
                <td>Schedule:</td>
                <td>
                    {{isset($view_summary_student->relBillingSchedule->title)?$view_summary_student->relBillingSchedule->title:''}}
                </td>
            </tr>
            <tr>
                <td>Total Cost:</td>
                <td>
                    {{isset($view_summary_student->total_cost)?$view_summary_student->total_cost:''}}
                </td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
                    {{ucfirst($view_summary_student->status)}}
                </td>
            </tr>
        </table>
        <br>
        <h4 class="text-blue text-center text-uppercase">Billing Details</h4>
        <table id="example" class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>SL.No</th>
                <th>Billing Item</th>
                <th>Cost Per Unit</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Waiver</th>
                <th>Waiver Amount</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php $sl=1;?>
            @if(isset($view_details_student))
                @foreach ($view_details_student as $value)
                    <tr>
                        <td class="sl-no-size">{{$sl++}}</td>
                        <td>{{isset($value->relBillingItem->title)?$value->relBillingItem->title:''}}</td>
                        <td>{{isset($value->cost_per_unit)?$value->cost_per_unit:'0'}}</td>
                        <td>{{isset($value->quantity)?$value->quantity:'0'}}</td>
                        <td>{{isset($value->total_amount)?$value->total_amount:'0'}}</td>
                        <td>{{isset($value->relWaiver->title)?$value->relWaiver->title:'0'}}</td>
                        <td>{{isset($value->waiver_amount)?$value->waiver_amount:'0'}}</td>
                        <td>{{$value['total_amount']-$value['waiver_amount']}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
</div>