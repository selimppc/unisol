
<div class='form-group'>
   {{ Form::label('code', 'Supplier Code') }}
   {{ Form::text('code', Input::old('code'),['class'=>'form-control', 'style'=>'text-transform: uppercase;', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('company_name', 'Company Name') }}
   {{ Form::text('company_name', Input::old('company_name'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('address', 'Address') }}
   {{ Form::textarea('address', Input::old('address'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x5', 'class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('country_id', 'Country') }}
   {{ Form::select('country_id', Country::country_lists(), Input::old('country_id'),['class'=>'form-control',  'required']) }}
</div>


<div class='form-group'>
   {{ Form::label('zip_code', 'Zip Code') }}
   {{ Form::text('zip_code', Input::old('zip_code'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('contact_person', 'Contact Person') }}
   {{ Form::text('contact_person', Input::old('contact_person'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('phone', 'Phone') }}
   {{ Form::text('phone', Input::old('phone'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('cell_phone', 'Cell Phone') }}
   {{ Form::text('cell_phone', Input::old('cell_phone'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('fax', 'Fax') }}
   {{ Form::text('fax', Input::old('fax'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('email', 'Email') }}
   {{ Form::text('email', Input::old('email'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('web', 'Web') }}
   {{ Form::text('web', Input::old('web'),['class'=>'form-control']) }}
</div>

{{ Form::hidden('status','open', Input::old('status'),['class'=>'form-control']) }}




{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
@include('inventory::product._script')