<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit Book :: {{isset($edit_book->title) ? $edit_book->title :''}} Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">
        
        {{Form::model($edit_book, array('route' => array('book.update', $edit_book->id), 'files' => true, 'class'=>'form-horizontal'))}}

        <div class='form-group'>
            <div>{{ Form::label('title', 'Title') }}</div>
            <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('isbn', 'ISBN') }}</div>
            <div>{{ Form::text('isbn', Input::old('isbn'),['class'=>'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            <div>{{ Form::label('category', 'category') }}</div>
            <div>{{ Form::select('category',$category,($edit_book->lib_book_category_id) ? $edit_book->lib_book_category_id :Input::old('category'),['class'=>'form-control','required']) }}</div>
        </div>

        <div class="form-group">
            <div>{{ Form::label('author', 'Author') }}</div>
            <div>{{ Form::select('author',$author,($edit_book->lib_book_author_id) ? $edit_book->lib_book_author_id :Input::old('author'),['class'=>'form-control','required']) }}</div>
        </div>

        <div class="form-group">
            <div>{{ Form::label('publisher', 'Publisher') }}</div>
            <div>{{ Form::select('publisher',$publisher,($edit_book->lib_book_publisher_id) ? $edit_book->lib_book_publisher_id :Input::old('publisher'),['class'=>'form-control','required']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('edition', 'Edition') }}</div>
            <div>{{ Form::text('edition', Input::old('edition'),['class'=>'form-control','spellcheck'=> 'true']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('stock_type', 'Stock Type') }}</div>
            <div>{{ Form::select('stock_type',array('' => 'Select One','hard' => 'Hard', 'soft' => 'Soft','both'=>'Both'),$edit_book->stock_type,['class'=>'form-control']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('self_number', 'Self Number') }}</div>
            <div>{{ Form::text('self_number',($edit_book->shelf_number	) ? $edit_book->shelf_number :'',['class'=>'form-control']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('book_type', 'Book Type') }}</div>
            <div>{{ Form::select('book_type',array('' => 'Select One','books' => 'Books', 'journal' => 'Journal','etc'=>'Etc'),$edit_book->book_type,['class'=>'form-control']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('commercial', 'commercial') }}</div>
            <div>{{ Form::select('commercial',array('' => 'Select One','student' => 'Student', 'both' => 'Both'),$edit_book->commercial,['class'=>'form-control']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('book_price', 'Book Price(TK)') }}</div>
            <div>{{ Form::text('book_price', Input::old('book_price'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('digital_sell_price', 'Digital Sell Price(TK)') }}</div>
            <div>{{ Form::text('digital_sell_price', Input::old('address'),['class'=>'form-control']) }}</div>

        </div>

        <div class='form-group'>
            <div>{{ Form::label('is_rented', 'Is Rented') }}</div>
            <div>{{ Form::select('is_rented',array('' => 'Select One','yes' => 'Yes', 'no' => 'No'),$edit_book->is_rented,['class'=>'form-control']) }}</div>
        </div>

        <div class='form-group'>
            {{ Form::label('docs', 'Upload File') }}
            <div>{{ Form::file('docs', Input::old('docs'),['class'=>'form-control']) }}</div>
            </br>
           <p style="background:#b7d3e5;width: 50%;">{{$edit_book->file}}</p>
        </div>
        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>' btn btn-success')) }}
            <button class=" btn btn-default" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>

