{{ HTML::script('assets/js/custom.js')}}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Billing SetUp</h4>
</div>
<div class="modal-body">
    {{ Form::open(array('url' => 'billing/setup/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
    @include('fees::billing_setup._form')
    {{ Form::close() }}
</div>