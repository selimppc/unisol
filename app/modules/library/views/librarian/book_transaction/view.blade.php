<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title text-center text-purple">View {{$view_book_transaction->relUser->relUserProfile->first_name.' '.$view_book_transaction->relUser->relUserProfile->last_name}}'s Book Transaction</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>User Name:</td>
                <td>
                    {{$view_book_transaction->relUser->relUserProfile->first_name.' '.$view_book_transaction->relUser->relUserProfile->last_name}}
                </td>
            </tr>
            <tr>
                <td>User Id:</td>
                <td>{{isset($view_book_transaction->relUser->id)?$view_book_transaction->relUser->id:''}}</td>
            </tr>
            <tr>
                <td>Book Name:</td>
                <td>{{isset($view_book_transaction->relLibBook->title)?$view_book_transaction->relLibBook->title:''}}</td>
            </tr>
            <tr>
                <td>Lib Trn Not:</td>
                <td>{{isset($view_book_transaction->lib_trn_no)?$view_book_transaction->lib_trn_no:''}}</td>
            </tr>
            <tr>
                <td>Issue Date:</td>
                <td>{{date("d-m-Y", strtotime((isset($view_book_transaction->issue_date)) ? $view_book_transaction->issue_date : '') ) }}</td>
            </tr>
            <tr>
                <td>Return Date:</td>
               <td>{{date("d-m-Y", strtotime((isset($view_book_transaction->return_date)) ? $view_book_transaction->return_date : '') ) }}</td>
            </tr>
            <tr>
                <td>Total Amount:</td>
                <td>{{isset($view_book_transaction->total_amount)?$view_book_transaction->total_amount:''}}</td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>{{ucfirst($view_book_transaction->status)}}</td>
            </tr>
        </table>

        @if($view_book_transaction->status == 'confirmed')
        <h4 class="text-blue text-center text-uppercase">Book Transaction Financial</h4>
        <table id="example" class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>SL.No</th>
                <th>Transaction Type</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php $sl=1;?>
            @if(isset($view_financial_data))
                @foreach ($view_financial_data as $value)
                    <tr>
                        <td class="sl-no-size">{{$sl++}}</td>
                        <td>{{isset($value->trn_type)?$value->trn_type:'0'}}</td>
                        <td>{{isset($value->amount)?$value->amount:'0'}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
       @endif
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
</div>