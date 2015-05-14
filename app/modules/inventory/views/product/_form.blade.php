
<div class='form-group'>
   {{ Form::label('code', 'Category Code') }}
   {{ Form::text('code', Input::old('code'),['class'=>'form-control', 'style'=>'text-transform: uppercase;', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('title', 'Title') }}
   {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('description', 'Description') }}
   {{ Form::textarea('description', Input::old('description'),[ 'size'=>'35x5', 'class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('image', 'Image') }}
   {{ Form::file('image',['class'=>'form-control']) }}
</div>


<div class='form-group'>
   {{ Form::label('product_class', 'Product Class') }}
   {{ Form::select('product_class', InvProduct::product_class(), Input::old('product_class'),['class'=>'form-control',  'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('inv_product_category_id', 'Product Category') }}
   {{ Form::select('inv_product_category_id', $pc_lists, Input::old('inv_product_category_id'),['class'=>'form-control',  'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('cost_price', 'Cost Price') }}
   {{ Form::text('cost_price', Input::old('cost_price'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('purchase_unit', 'Purchase Unit') }}
   {{ Form::text('purchase_unit', Input::old('purchase_unit'),['class'=>'form-control',  'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('purchase_unit_quantity', 'Purchase Unit Quantity') }}
   {{ Form::text('purchase_unit_quantity', Input::old('purchase_unit_quantity'),['class'=>'form-control',  'required']) }}
</div>


<div class='form-group'>
   {{ Form::label('stock_unit', 'Stock Unit') }}
   {{ Form::text('stock_unit', Input::old('stock_unit'),['class'=>'form-control',  'required']) }}
</div>


<div class='form-group'>
   {{ Form::label('stock_unit_quantity', 'Stock Unit Quantity') }}
   {{ Form::text('stock_unit_quantity', Input::old('stock_unit_quantity'),['class'=>'form-control',  'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('stock_type', 'Stock Type') }}
   {{ Form::text('stock_type', Input::old('stock_type'),['class'=>'form-control',  'required']) }}
</div>


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
