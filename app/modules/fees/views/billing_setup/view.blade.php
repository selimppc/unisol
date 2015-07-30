<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">View Billing Setup Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>Degree Name:</td>
                <td>
                    {{isset($view_details->relBatch->relDegree->relDegreeProgram->title) ? $view_details->relBatch->relDegree->relDegreeProgram->title :''}}
                </td>
            </tr>
            <tr>
                <td>Batch:</td>
                <td>
                    {{isset($view_details->relBatch->batch_number) ? $view_details->relBatch->batch_number :''}}
                </td>
            </tr>
            <tr>
                <td>Schedule:</td>
                <td>
                    {{isset($view_billing_setup->relBillingSchedule->title) ? $view_billing_setup->relBillingSchedule->title :''}}
                </td>
            </tr>
            <tr>
                <td>Item:</td>
                <td>
                    {{isset($view_billing_setup->relBillingItem->title) ? $view_billing_setup->relBillingItem->title : ''}}
                </td>
            </tr>
            <tr>
                <td>Cost:</td>
                <td>
                    {{isset($view_billing_setup->cost) ? $view_billing_setup->cost : ''}}
                </td>
            </tr>
            <tr>
                <td>Deadline:</td>
                <td>
                    {{date("d-m-Y", strtotime((isset($view_billing_setup->deadline)) ? $view_billing_setup->deadline : '') ) }}
                </td>
            </tr>
            <tr>
                <td>Fined Cost:</td>
                <td>
                    {{isset($view_billing_setup->fined_cost) ? $view_billing_setup->fined_cost : ''}}
                </td>
            </tr>

        </table>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
</div>