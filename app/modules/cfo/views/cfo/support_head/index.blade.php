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
                     <li class="active"><a href="{{Route('support-head.status',['value'=>'new'])}}" data-target="#new" class="media_node span" id="new_tab" data-toggle="tabajax" rel="tooltip">NEW</a></li>
                     <li><a href="{{Route('support-head.status',['value'=>'open'])}}" data-target="#open" class="media_node span" id="open_tab" data-toggle="tabajax" rel="tooltip"> OPEN</a></li>
                     <li><a href="{{Route('support-head.status',['value'=>'replied'])}}" data-target="#replied" class="media_node span" id="replied_tab" data-toggle="tabajax" rel="tooltip">REPLIED</a></li>
                     <li><a href="{{Route('support-head.status',['value'=>'closed'])}}" data-target="#closed" class="media_node span" id="closed_tab" data-toggle="tabajax" rel="tooltip"> CLOSED </a></li>
               </ul>
               <div class="tab-content">
                   <div class="tab-pane active" id="new">

                   </div>

                   <div class="tab-pane" id="open">

                   </div>

                   <div class="tab-pane" id="replied">

                   </div>

                   <div class="tab-pane" id="closed">

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
             url : 'support-head/status/new',
             dataType: 'json'
         }).done(function (data) {
             $('#new').html(data);
         }).fail(function () {
             alert('Posts could not be loaded.');
             return false;
         });
    });
});



</script>

@stop
