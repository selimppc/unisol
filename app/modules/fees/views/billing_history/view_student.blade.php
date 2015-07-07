<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title text-center text-purple">View {{isset($data->first_name) ? $data->first_name:''}} {{isset($data->last_name) ? $data->last_name:''}}'s Billing History </h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <div class="box-body table-responsive ">
        {{--    <h4 class="text-blue text-center text-uppercase">Student Information</h4>--}}
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <td>Name:</td>
                    <td>{{isset($data->first_name) ? $data->first_name:''}} {{isset($data->last_name) ? $data->last_name:''}}
                    </td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td>
                        {{isset($data->relDepartment->title) ? $data->relDepartment->title :''}}
                    </td>
                </tr>
                <tr>
                    <td>Degree:</td>
                    <td>
                        {{isset($data->relDegree->relDegreeProgram->title) ? $data->relDegree->relDegreeProgram->title :''}}
                    </td>
                </tr>
                <tr>
                    <td>Batch:</td>
                    <td>
                        {{isset($data->relBatch->batch_number) ? $data->relBatch->batch_number :''}}
                    </td>
                </tr>
                <tr>
                    <td>User Type:</td>
                    <td>
                        Student
                    </td>
                </tr>
            </table>
        </div>
        <div>&nbsp;</div>
        <h4 class="text-blue text-center text-uppercase">Billing Details</h4>
        <br>
        <div class="box-body table-responsive ">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <th>SL.No</th>
                <th>Item</th>
                <th>Schedule</th>
                <th>Cost Per Unit</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Waiver Amount</th>
                <th>Amount</th>
                </thead>
                <tbody>
                <?php $i=0;$sl=1 ?>
                @if(isset($relation_data))
                    @foreach($relation_data[0]->relBillingDetailsStudent as $value)
                        <tr>
                            <td class="sl-no-size">{{$sl++}}</td>
                            <td>{{$value['relBillingItem']['title']}}</td>

                            <td>{{$relation_data[$i]->relBillingSchedule->title}}</td>

                            <td>{{$value['cost_per_unit']}}</td>

                            <td>{{$value['quantity']}}</td>

                            <td>{{$value['total_amount']}}</td>

                            <td>{{$value['waiver_amount']}}</td>

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
</div>





