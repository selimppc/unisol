@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
 @include('layouts._sidebar_cfo')
@stop
@section('content')

<div class="wrapper row-offcanvas row-offcanvas-left">

    <h3 class="page-header">Support Desk</h3>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
               <ul class="nav nav-tabs tabs-up" id="status_tab">
                     <li><a href="{{Route::to('support-head.index')}}" data-target="#contacts" class="media_node active span" id="contacts_tab" data-toggle="tabajax" rel="tooltip"> ALL </a></li>
                     <li><a href="{{Route::to('support-head.index')}}" data-target="#friends_list" class="media_node span" id="friends_list_tab" data-toggle="tabajax" rel="tooltip"> NEW</a></li>
                     <li><a href="{{Route::to('support-head.index')}}" data-target="#awaiting_request" class="media_node span" id="awaiting_request_tab" data-toggle="tabajax" rel="tooltip">OPEN</a></li>
               </ul>
               <div class="tab-content">
                   <div class="tab-pane active" id="contacts">
                       contacts
                   </div>
                   <div class="tab-pane" id="friends_list">
                       friends_list
                   </div>
                   <div class="tab-pane" id="awaiting_request">
                       awaiting_request
                   </div>
               </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </div> <!-- /.row -->
    <!-- END CUSTOM TABS -->
</div><!-- ./wrapper -->

{{-- Modal Area --}}
<div class="modal fade" id="support" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
});

</script>


@stop
