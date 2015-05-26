<div class='form-group'>
    <div>{{ Form::label('title', 'Title') }}</div>
    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
    </div>
</div>

<div class='form-group'>
    <div>{{ Form::label('isbn', 'ISBN') }}</div>
    <div>{{ Form::text('isbn', Input::old('isbn'),['class'=>'form-control','required'=>'required']) }}
    </div>
</div>

<div class='form-group'>
    <div>{{ Form::label('category', 'Category') }}</div>
    <div>{{ Form::select('category', [''=>'Select Category' ] + $category, Input::old('category'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('author', 'Author') }}</div>
    <div>{{ Form::select('author', [''=>'Select Author' ] + $author, Input::old('author'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('publisher', 'Publisher') }}</div>
    <div>{{ Form::select('publisher', [''=>'Select Publisher' ] + $publisher, Input::old('publisher'), array('class' => 'form-control') ) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('edition', 'Edition') }}</div>
    <div>{{ Form::text('edition', Input::old('edition'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
    </div>
</div>

<div class='form-group'>
    <div>{{ Form::label('stock_type', 'Stock Type') }}</div>
    <div>{{ Form::select('stock_type',array('' => 'Select One','hard' => 'Hard', 'soft' => 'Soft','both'=>'Both'),'',['class'=>'form-control','required'=>'required']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('self_number', 'Self Number') }}</div>
    <div>{{ Form::text('self_number', Input::old('self_number'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
    </div>
</div>

<div class='form-group'>
    <div>{{ Form::label('book_type', 'Book Type') }}</div>
    <div>{{ Form::select('book_type',array('' => 'Select One','books' => 'Books', 'journal' => 'Journal','etc'=>'Etc'),'',['class'=>'form-control','required'=>'required']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('commercial', 'commercial') }}</div>
    <div>{{ Form::select('commercial',array('' => 'Select One','student' => 'Student', 'both' => 'Both'),'',['class'=>'form-control','required'=>'required']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('book_price', 'Book Price(TK)') }}</div>
    <div>{{ Form::text('book_price', Input::old('book_price'),['class'=>'form-control','required'=>'required']) }}
    </div>
</div>

<div class='form-group'>
    <div>{{ Form::label('digital_sell_price', 'Digital Sell Price(TK)') }}</div>
    <div>{{ Form::text('digital_sell_price', Input::old('address'),['class'=>'form-control','required'=>'required']) }}</div>

</div>

<div class='form-group'>
    <div>{{ Form::label('is_rented', 'commercial') }}</div>
    <div>{{ Form::select('is_rented',array('' => 'Select One','yes' => 'Yes', 'no' => 'No'),'',['class'=>'form-control','required'=>'required']) }}</div>
</div>

<div class='form-group'>
    {{ Form::label('docs', 'Upload File') }}
    {{ Form::file('docs[]', array('multiple'=>true)) }}
</div>
<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
    <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>