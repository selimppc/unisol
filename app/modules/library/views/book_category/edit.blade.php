<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Create Book Category</h4>
</div>
<div class="modal-body">

    <div style="padding: 10px; width: 90%;">

        {{ Form::model($edit_category,array('url'=> array('category/update',$edit_category->id), 'method' => 'POST')) }}

        @include('library::book_category._form')

        {{ Form::close() }}

    </div>
</div>

<div class="modal-footer">

</div>
