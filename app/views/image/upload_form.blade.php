

    {{ HTML::script('assets/etsb/etsb_js/jquery/jquery-2.1.1.min.js')}}

    {{ HTML::script('assets/etsb/etsb_js/jquery/jquery.form.js')}}

    <div class="span8">
        <!-- Post Title -->
        <div class="row">
            <div class="span8">
                <h4>Ajax Image Upload and Preview </h4>
            </div>
        </div>
        <!-- Post Footer -->
        <div class="row">
            <div class="span3">
                <div id="validation-errors"></div>
                <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ url('upload/image') }}" autocomplete="off">
                    <input type="file" name="image" id="image" /> 
                </form>
            </div>
            <div class="span5">
                <div id="output" style="display:none">
                </div>
            </div>
        </div>
    </div>

@include('image.script_image')
