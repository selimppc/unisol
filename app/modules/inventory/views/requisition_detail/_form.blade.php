{{Form::hidden('inv_requisition_head_id', $req_head->id)}}

<div class='form-group'>
   {{ Form::label('inv_product_id', 'Product Name') }} ( <small>Search Product by Typing Product Name or Product Code</small> )
   {{ Form::text('inv_product_id',  '', ['id'=>'search_product', 'class'=>'ui-autocomplete form-control','placeholder'=>'search product ..', 'autofocus', ]) }}
</div>
{{Form::hidden('inv_product_id', null,['id'=>'product-id'])}}

<div class='row'>
    <div class="col-sm-3">
        <div class='form-group'>
            {{ Form::label('rate', 'Rate') }}
               {{ Form::text('rate', Input::old('rate'),['id'=>'product-rate']) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class='form-group'>
           {{ Form::label('unit', 'Unit') }}
           {{ Form::text('unit', Input::old('unit'),['id'=>'product-unit']) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class='form-group'>
           {{ Form::label('quantity', 'Quantity') }}
           {{ Form::text('quantity', Input::old('quantity'),['id'=>'product-quantity']) }}
        </div>
    </div>
    <div class="col-sm-3" style="padding: 4%">
        <button class="pull-right btn-sm btn-linkedin" onclick="addProduct()"> + Product</button>
    </div>
</div>






{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>


<p>&nbsp;</p>
@include('inventory::requisition_detail._script')

{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}