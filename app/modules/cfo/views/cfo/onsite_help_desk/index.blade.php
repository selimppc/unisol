@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
 @include('layouts._sidebar_cfo')
@stop
@section('content')

<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('help-desk.create')}}" data-toggle="modal" data-target="#help-desk"><b>+Add New</b></a>
{{--<a class="pull-right btn btn-xs btn-info" href="{{ URL::route('help-desk')}}" data-toggle="modal" data-target="#help-desk"><b>My Desk</b></a>--}}

<div class="wrapper row-offcanvas row-offcanvas-left">

    <h3 class="page-header">Help Desk</h3>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs tabs-up" id="status_tab">
                     <li class="active"><a href="{{Route('help-desk.status',['value'=>'open'])}}" data-target="#open" class="media_node span" id="open_tab" data-toggle="tabajax" rel="tooltip">OPEN</a></li>
                     <li><a href="{{Route('help-desk.status',['value'=>'served'])}}" data-target="#served" class="media_node span" id="served_tab" data-toggle="tabajax" rel="tooltip">SERVED </a></li>
                     <li><a href="{{Route('help-desk.status',['value'=>'waiting'])}}" data-target="#waiting" class="media_node span" id="waiting_tab" data-toggle="tabajax" rel="tooltip">WAITING</a></li>
                     <li><a href="{{Route('help-desk.status',['value'=>'serving'])}}" data-target="#serving" class="media_node span" id="serving_tab" data-toggle="tabajax" rel="tooltip"> SERVING </a></li>
                     <li><a href="{{Route('help-desk.status',['value'=>'closed'])}}" data-target="#closed" class="media_node span" id="closed_tab" data-toggle="tabajax" rel="tooltip"> CLOSED </a></li>
                     <li><a href="{{Route('help-desk.status',['value'=>'my_desk'])}}" data-target="#my_desk" class="media_node span" id="my_desk_tab" data-toggle="tabajax" rel="tooltip"> MY DESK </a></li></ul>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="open"></div>

                    <div class="tab-pane" id="served"></div>

                    <div class="tab-pane" id="waiting"> </div>

                    <div class="tab-pane" id="serving"></div>

                    <div class="tab-pane" id="closed"></div>

                    <div class="tab-pane" id="my_desk">

                    </div>
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </div> <!-- /.row -->
    <!-- END CUSTOM TABS -->
</div><!-- ./wrapper -->

{{-- Modal Area --}}
<div class="modal fade" id="support" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>


<script>
$(function(){

    $('[data-toggle="tabajax"]').click(function(e) {

        var $this = $(this),
        loadurl = $this.attr('href'),
        targ = $this.attr('data-target');

        $.get(loadurl, function(data) {
            $(targ).html(data);
        });

        $this.tab('show');
        return false;
    });

    $(window).load(function() {
     $.ajax({
             url : 'help-desk/status/open',
             dataType: 'json'
         }).done(function (data) {
             $('#open').html(data);
         }).fail(function () {
             alert('Posts could not be loaded.');
             return false;
         });
    });
});

</script>

<!-- Modal Area -->

<div class="modal fade" id="help-desk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

<!-- Modal for delete -->
    <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
              </div>
              <div class="modal-body">
                    <strong>Are you sure to delete?</strong>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>

              </div>
        </div>
      </div>
    </div>


@stop
