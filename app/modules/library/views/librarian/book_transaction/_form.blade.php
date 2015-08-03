{{ HTML::script('assets/js/custom.js')}}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Book Transaction</h4>
</div>
<div class="modal-body">
    <div style="padding: 0px 20px 20px 20px;">
        {{Form::open(array('route' => array('book-transaction-save')))}}
        <div class='form-group'>
            <div>{{ Form::label('user', 'User Name') }}</div>
            <div>{{ Form::select('user_id', [''=>'Select User' ] + $user, Input::old('user_id'), array('class' => 'form-control') ) }}</div>
        </div>
        <div class='form-group'>
            <div>{{ Form::label('book', 'Book') }}</div>
            <div>{{ Form::select('lib_books_id', [''=>'Select Book' ] + $lib_book, Input::old('lib_books_id'), array('class' => 'form-control') ) }}</div>
        </div>
        <div class='form-group'>
            <div>{{ Form::label('lib_trn_no', 'Lib Trn No') }}</div>
            <div>{{ Form::text('lib_trn_no', Input::old('lib_trn_no'),['class'=>'form-control']) }}
            </div>
        </div>
        <div class='form-group'>
            {{ Form::label('issue_date', 'Issue Date') }}
            {{ Form::text('issue_date', Input::old('issue_date'),['class'=>'form-control date_picker','required'=>'required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('return_date', 'Return Date') }}
            {{ Form::text('return_date', Input::old('return_date'),['class'=>'form-control date_picker','required'=>'required']) }}
        </div>
        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>' btn btn-success')) }}
            <button class=" btn btn-default" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>



