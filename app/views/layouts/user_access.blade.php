@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')
    @if( Session::has('user-access'))
        <script type="text/javascript">
            //$(document).ready(function() {
                $('#popupmodal').modal();
            //});
        </script>


        <div id="popupmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Notification: Please read</h3>
            </div>
            <div class="modal-body">
                <p>
                    {{ Session::get('user-access') }}
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>


    @endif

@stop