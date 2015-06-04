<div class="modal-header" xmlns="http://www.w3.org/1999/html">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;">Edit Book :: {{isset($edit_r_c->title) ? $edit_r_c->title :''}} Information</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px;">

        {{Form::model($edit_r_c, array('route' => array('amw.research-paper.update', $edit_r_c->id), 'files' => true, 'class'=>'form-horizontal'))}}

        <div class='form-group'>
            <div>{{ Form::label('title', 'Title') }}</div>
            <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('abstract', 'Abstract') }}</div>
            <div>{{ Form::text('abstract', Input::old('abstract'),['class'=>'form-control']) }}
            </div>
        </div>

        <div class="form-group">
            <div>{{ Form::label('rnc_category_id', 'category') }}</div>
            <div>{{ Form::select('rnc_category_id',$edit_category,($edit_r_c->rnc_category_id) ? $edit_r_c->rnc_category_id :Input::old('rnc_category_id'),['class'=>'form-control','required']) }}</div>
        </div>

        <div class="form-group">
            <div>{{ Form::label('where_published_id', 'Publisher') }}</div>
            <div>{{ Form::select('where_published_id',$edit_publisher,($edit_r_c->where_published_id) ? $edit_r_c->where_published_id :Input::old('where_published_id'),['class'=>'form-control','required']) }}</div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('publication_no', 'Publication No') }}</div>
            <div>{{ Form::text('publication_no', Input::old('publication_no'),['class'=>'form-control','spellcheck'=> 'true']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('details', 'Details') }}</div>
            <div>{{ Form::text('details',Input::old('details'),['class'=>'form-control']) }}</div>
        </div>

         <div class='form-group'>
            <div>{{ Form::label('searching', 'searching') }}</div>
            <div>{{ Form::select('searching',array('' => 'Select One','yes' => 'Yes', 'no' => 'No'),$edit_r_c->searching,['class'=>'form-control']) }}</div>
        </div>

         <div class='form-group'>
            <div>{{ Form::label('benefit_share', 'Benefit Share') }}</div>
            <div>{{ Form::text('benefit_share',($edit_r_c->benefit_share	) ? $edit_r_c->benefit_share :'',['class'=>'form-control']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('price', 'Price') }}</div>
            <div>{{ Form::text('price', Input::old('price'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('note', 'Note') }}</div>
            <div>{{ Form::text('note', Input::old('note'),['class'=>'form-control','required'=>'required']) }}
            </div>
        </div>

        <div class='form-group'>
            <div>{{ Form::label('status', 'Status') }}</div>
            <div>{{ Form::select('status',array('' => 'Select One','open' => 'Open', 'close' => 'Close','approved' => 'Approved', 'reviewed' => 'Reviewed' ,  'published' => 'published'),$edit_r_c->status,['class'=>'form-control']) }}</div>
        </div>


       <div class='form-group'>
           <div>{{ Form::label('reviewed_by', 'Reviewed By') }}</div>
           <div>{{ Form::select('reviewed_by', $edit_reviewed_by , Input::old('reviewed_by'), array('class' => 'form-control') ) }}</div>
       </div>

        <div class='form-group'>
            {{ Form::label('file', 'Upload File') }}
            <div>{{ Form::file('file', Input::old('file'),['class'=>'form-control']) }}</div>
            </br>
           <p style="background:#b7d3e5;width: 50%;">{{$edit_r_c->file}}</p>
        </div>
        <div class="modal-footer">
            {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
            <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
        </div>
        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
</div>
