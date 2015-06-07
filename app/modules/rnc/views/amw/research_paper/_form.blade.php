<div class='form-group'>
    <div>{{ Form::label('title', 'Title') }}</div>
    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('abstract', 'Abstract') }}</div>
    <div>{{ Form::text('abstract', Input::old('abstract'),['class'=>'form-control']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('rnc_category_id', 'RnC Category') }}</div>
    <div>{{ Form::select('rnc_category_id', [''=>'Select Category' ] + $rnc_category, Input::old('rnc_category_id'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('where_published_id', 'RnC Publisher') }}</div>
    <div>{{ Form::select('where_published_id', [''=>'Select Publisher' ] + $rnc_publisher, Input::old('where_published_id'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('publication_no', 'Publication No') }}</div>
    <div>{{ Form::text('publication_no',Input::old('publication_no') , array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('details', 'Details') }}</div>
    <div>{{ Form::text('details', Input::old('details'),['class'=>'form-control','spellcheck'=> 'true']) }}</div>
</div>

{{--free type--}}

<div class='form-group'>
    <div>{{ Form::label('searching', 'searching') }}</div>
    <div>{{ Form::select('searching',array('' => 'Select One','yes' => 'Yes', 'no' => 'No'),'',['class'=>'form-control']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('benefit_share', 'Benefit Share') }}</div> Minimum share is 30%
    <div>{{ Form::text('benefit_share', Input::old('benefit_share'),['class'=>'form-control','spellcheck'=> 'true']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('price', 'Price') }}</div>
    <div>{{ Form::text('price', Input::old('price'),['class'=>'form-control','required'=>'required']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('note', 'Note') }}</div>
    <div>{{ Form::text('note', Input::old('note'),['class'=>'form-control','required'=>'required']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('status', 'Status') }}</div>
    <div>{{ Form::select('status',array('' => 'Select One','open' => 'Open', 'close' => 'Close','approved' => 'Approved', 'reviewed' => 'Reviewed' ,  'published' => 'published'),'',['class'=>'form-control']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('reviewed_by', 'Reviewed By') }}</div>
    <div>{{ Form::select('reviewed_by', $reviewed_by , Input::old('reviewed_by'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    {{ Form::label('file', 'Upload File') }}
    <div>{{ Form::file('file', Input::old('file'),['class'=>'form-control ']) }}</div>
</div>

<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
    <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>