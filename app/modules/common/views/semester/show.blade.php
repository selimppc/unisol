<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Show Semester</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'semester/show','method' => '')) }}
        <div class="jumbotron text-center">
            <h2><strong>Name :</strong>{{ $term_semester->title }}</h2>
            <p>
                <strong> Description:</strong> {{ $term_semester->description }}
            </p>
        </div>

        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('common/semester/')}}" class="btn btn-default">Close </a>
    {{--<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>--}}
</div>



