<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit </h4>
</div>

<div class="modal-body">

 {{Form::model($model, array('route'=>['provident-fund.update',$model->id,'class'=>'form-control','files'=>true]))}}
     @include('hr::hr.hr_provident_fund._form')
 {{ Form::close() }}

</div>

{{ HTML::script('assets/js/custom.js')}}
