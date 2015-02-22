
        <div class='form-group'>
        <div>{{ Form::label('title', 'ClassTitle') }}</div>
        <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}</div>
        </div>
        <div class='form-group'>
        <div>{{ Form::label('description', 'Description') }}</div>
        <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}</div>
        </div>
        {{--This field will add later when acm_class_schedule tb is create--}}
        {{--<div class='form-group'>
        <div>{{ Form::label('classtime', 'ClassTime') }}</div>
        <div> {{ Form::select('classtime', array(''=>'Select','1' => 'Applicant', '2' => 'Teacher','3'=>'Staff'), '', array('class' => 'form-control','data-parsley-trigger'=>'change','required'=>'required'))}}
        </div>
        </div>--}}
        {{--<div class='form-group'>--}}
        {{--<div>{{ Form::label('file', 'Upload File') }}</div>--}}
        {{--<div>{{Form::file('file[]', ['multiple' => true], ['class'=>'form-control'])}}</div>--}}
        {{--</div>--}}
        <div class="panel-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
                        Upload Images
                </button>
                <a href="" data-toggle="modal" data-target="#uploadModal"></a>
        </div>
        <div>
        {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
        <a href="{{URL::to('academic/faculty/marksdistitem/class/')}}" class="btn btn-default">Close</a>
        </div>

        <!-- Modal for upload photo-->
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Upload Images</h4>
                                </div>
                                <div class="modal-body">
                                        {{ Form::open(['url'=>'', 'class' => 'dropzone', 'id' => 'my-awesome-dropzone']) }}
                                        {{ Form::close() }}
                                </div>
                                <div class="modal-footer">
                                </div>
                        </div>
                </div>
        </div>


