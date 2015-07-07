  {{ HTML::style('assets/etsb/etsb_css/bootstrap/bootstrap.min.css') }}
  {{--{{ HTML::style('assets/css/bootstrap-timepicker.css') }}--}}
  {{ HTML::style('assets/css/bootstrap-timepicker.min.css') }}

    <div class="input-append bootstrap-timepicker">
        <input id="timepicker1" type="text" class="input-small">
        <span class="add-on"><i class="icon-time"></i></span>
    </div>

    <script type="text/javascript">
        $('#timepicker1').timepicker();
    </script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
{{ HTML::script('assets/etsb/etsb_js/jquery/jquery-2.1.1.min.js')}}
{{ HTML::script('assets/js/bootstrap-timepicker.js')}}
{{ HTML::script('assets/js/bootstrap-timepicker.min.js')}}
{{ HTML::script('assets/js/bootstrap-2.2.2.min.js')}}