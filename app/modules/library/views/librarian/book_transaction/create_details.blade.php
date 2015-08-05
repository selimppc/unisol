<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="text-center text-purple">Create {{$user_name->relUser->relUserProfile->first_name.' '.$user_name->relUser->relUserProfile->last_name}}'s Book Transaction Financial </h4>
</div>
<div class="modal-body">

    <p class="text-blue text-uppercase">Book Name :: {{$user_name->relLibBook->title}}</p>
    <p class="text-blue text-uppercase">Hard Copy Price :: {{isset($user_name->relLibBook->book_price)?$user_name->relLibBook->book_price:'0'}}</p>
    <p class="text-blue text-uppercase">Soft Copy Price :: {{isset($user_name->relLibBook->digital_sell_price)? $user_name->relLibBook->digital_sell_price:'0'}}</p>
    <div style="padding: 10px;">

        {{Form::open(array('route' => array('billing.details.applicant.save')))}}

        {{ Form::hidden('book_transaction_id', $book_transaction_id, ['class'=>'form-control'])}}
        {{ Form::hidden('trn_type','Commercial', ['class'=>'form-control'])}}
        <div class="col-sm-3">
            <div class="form-group">
                {{ Form::label('type', 'Book Type') }}
                {{ Form::text('stock_type',ucfirst($user_name->relLibBook->stock_type), ['class'=>'form-control'])}}
            </div>
        </div>
        <div class="col-sm-4">
            <div class='form-group'>
             {{ Form::label('amount', 'Total Amount')}}
                {{ Form::text('amount',($user_name->relLibBook->book_price)+($user_name->relLibBook->digital_sell_price),Input::old('amount'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>
        <span class="pull-left" id="fill-up-form" style="color:#f06f5d; font-weight: bold"></span>
        <div class="col-sm-2">
            <div class='form-group' style="margin-top: 24px">
                {{ Form::submit('Save', ['class'=>'btn btn-success']) }}
            </div>
        </div>

        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
    </div>
    {{ Form::close() }}
        <table class="table table-bordered small-header-table">
            <thead>
            <th>Sl No</th>
            <th>Amount</th>
            <th>Transaction Type</th>
            <th>Action</th>
            </thead>

            <tbody>
            <?php $sl=1;?>
            @foreach ($book_trans_fin_data as $value)
                <tr>
                    <td style="width: 10%">{{$sl++}}</td>
                    <td>{{isset($value->amount)? $value->amount:'0'}}</td>
                    <td>{{ucfirst($value->trn_type)}}</td>
                    <td><a class="btn btn-default btn-sm" id="removeTrId" onClick="deleteNearestTr(this.id, {{$value->id}})"><i class="fa fa-trash-o text-red" style="font-size: 15px;"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    <button class="btn btn-default pull-right " data-dismiss="modal" type="button">Close</button>

    </div>
<div>&nbsp;</div>
<div>&nbsp;</div>
@include('library::librarian.book_transaction._script')





