<style>
    input{
        border-color: 1px solid #efefef;
    }
    #test input {
        border: none;
        width: 99%;
    }
</style>
<div class='form-group'>
   {{ Form::label('invProductId', 'Product Name') }} ( <small>Search Product by Typing Product Name or Product Code</small> )
   {{ Form::text('invProductId',  '', ['id'=>'search_product', 'class'=>'ui-autocomplete form-control', 'placeholder'=>'search product ..', 'autofocus', ]) }}
</div>
{{Form::hidden('invProductId', null,['id'=>'product-id'])}}
{{Form::hidden('invProductName', null,['id'=>'product-name'])}}

<div class='row'>
    <div class="col-sm-3">
        <div class='form-group'>
            {{ Form::label('invProductRate', 'Rate') }}
               {{ Form::text('invProductRate', Input::old('invProductRate'),['id'=>'product-rate']) }}
        </div>
    </div>
    <div class="col-sm-3">
        <div class='form-group'>
           {{ Form::label('invProductUnit', 'Unit') }}
           <input type="text" name="invProductUnit" id="product-unit" readonly style="background-color: lavender">
        </div>
    </div>
    <div class="col-sm-3">
        <div class='form-group'>
           {{ Form::label('invProductQuantity', 'Quantity') }}
           {{ Form::text('invProductQuantity', Input::old('invProductQuantity'),['id'=>'product-quantity']) }}
        </div>
    </div>
    <div class="col-sm-3" style="padding: 4%">
        <input type="button" class="pull-right btn-xs btn-linkedin" id="add-new-product" value="+ Product">
    </div>
</div>

@include('inventory::requisition_detail._script')

<p>
    <b> Product Detail(s)</b>
    <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
</p>
<table class="table table-bordered small-header-table" id="amwCourseConfig">
    <thead>
    <th>Product Name</th>
    <th>Rate </th>
    <th>Unit </th>
    <th>Quantity</th>
    <th>Action</th>
    </thead>

        {{Form::hidden('inv_requisition_head_id', $req_head->id)}}
    <tbody id="test">
    </tbody>

    <tbody>
    <?php $counter = 0;?>

    @foreach($req_dt as $key=>$value)
        <tr>
            <td>{{isset($value->inv_product_id) ? $value->relInvProduct->title : ''}}</td>
            <td>{{round($value->rate, 2)}}</td>
            <td>{{round($value->unit)}}</td>
            <td>{{round($value->quantity)}}</td>
            <td>
                <a data-href="{{ $value->id }}" class="btn btn-default btn-sm delete-dt" id="delete-dt{{ $value->id }}" ><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a>

            </td>
        </tr>
        <?php $counter++;?>
        <script>
            // Add item is to arrayList at edit time.
            $( document ).ready(function() {
                var productsId = {{ $value->inv_product_id }}
                pushListItem(productsId);
            });
        </script>
   @endforeach

</table>

{{ Form::submit('Submit (Product) ', ['class'=>'pull-right btn btn-xs btn-success', 'style'=>'padding: 1%;'] ) }}
{{--{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}--}}
{{--<a href="" class="pull-left btn btn-default" style="margin-right: 5px">Close</a>--}}


<p>&nbsp;</p>


{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}