<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title text-center text-purple">View {{isset($view_summary_applicant->relApplicant->first_name) ? $view_summary_applicant->relApplicant->first_name:''}}
        {{isset($view_summary_applicant->relApplicant->last_name) ? $view_summary_applicant->relApplicant->last_name:''}}'s Billing Summary </h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>Applicant Name:</td>
                <td>
                    {{isset($view_summary_applicant->relApplicant->first_name) ? $view_summary_applicant->relApplicant->first_name:''}}
                    {{isset($view_summary_applicant->relApplicant->last_name) ? $view_summary_applicant->relApplicant->last_name:''}}
                </td>
            </tr>
            <tr>
                <td>Schedule:</td>
                <td>
                    {{$view_summary_applicant->relBillingSchedule->title}}
                </td>
            </tr>
            <tr>
                <td>Total Cost:</td>
                <td>
                    {{$view_summary_applicant->total_cost}}
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
                <th>Waiver</th>
                <th>Waiver Amount</th>
                <th>Cost Per Unit</th>
                <th>Quantity</th>
                <th>Total Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php $sl=1;?>
            @if(isset($view_details_applicant))
            @foreach ($view_details_applicant as $value)
                <tr>
                    <td class="sl-no-size">{{$sl++}}</td>
                    <td>{{isset($value->relBillingItem->title)?$value->relBillingItem->title:''}}</td>
                    <td>{{$value->relWaiver->title}}</td>
                    <td>{{$value->waiver_amount}}</td>
                    <td>{{$value->cost_per_unit}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{$value->total_amount}}</td>
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