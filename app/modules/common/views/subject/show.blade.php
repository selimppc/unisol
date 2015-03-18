<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Show Subject</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">
        {{ Form::open(array('url'=>'subject/show','method' => '')) }}

        <div class="jumbotron text-center">
            <h2><strong> Subject:</strong>  {{ $subject->title }}</h2>
            <h2><strong> Department:</strong> {{$subject->relDepartment->title}}</h2>
            <h2>
                <strong> Description:</strong> {{ $subject->description }}
            </h2>
        </div>
        {{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('common/subject/')}}" class="btn btn-default">Close </a>
</div>