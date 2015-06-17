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
                     <li class="active"><a href="{{Route('support-head.status',['value'=>'new'])}}" data-target="#new" class="media_node active span" id="new_tab" data-toggle="tabajax" rel="tooltip"> NEW </a></li>
                     <li><a href="{{Route('support-head.status',['value'=>'open'])}}" data-target="#open" class="media_node span" id="open_tab" data-toggle="tabajax" rel="tooltip"> OPEN</a></li>
                     <li><a href="{{Route('support-head.status',['value'=>'replied'])}}" data-target="#replied" class="media_node span" id="replied_tab" data-toggle="tabajax" rel="tooltip">REPLIED</a></li>
                     <li><a href="{{Route('support-head.status',['value'=>'closed'])}}" data-target="#closed" class="media_node span" id="closed_tab" data-toggle="tabajax" rel="tooltip"> CLOSED </a></li>
               </ul>
               <div class="tab-content">
                   <div class="tab-pane active" id="new">
                        <table id="" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                               <tr>
                                   <th> Name</th>
                                   <th> Email </th>
                                   <th> Phone</th>
                                   <th> Subject</th>
                                   <th> Priority</th>
                                   <th> Support Code</th>
                                   <th> Status</th>
                                   <th> Action</th>
                               </tr>
                           </tr>
                        </thead>
                        <tbody>
                          @if(isset($support_data))
                              <div>
                                   @foreach($support_data as $values)
                                         <tr>
                                             <td>{{$values->name}}</td>
                                             <td>{{$values->email}}</td>
                                             <td>{{$values->phone}}</td>
                                             <td>{{$values->subject}}</td>
                                             <td>{{$values->priority}}</td>
                                             <td>{{$values->support_code}}</td>
                                              <td>{{ucfirst($values->status)}}</td>
                                             <td>
                                             @if(($values->status =='closed'))
                                                 <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px" >View</a>
                                             @else
                                                 <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px" >View</a>
                                                 <a href="{{ URL::route('support-head.reply',['id'=>$values->id])}}" class="btn btn-info btn-xs" >Reply</a>
                                             @endif
                                             </td>
                                         </tr>
                                     @endforeach
                              </div>
                          @endif
                        </tbody>
                        </table>

                        <div class="pagination" style="margin-left:2%">
                          {{ $support_data->links() }}
                        </div>
                   </div>
                   <div class="tab-pane" id="open">

                   </div>
                   <div class="tab-pane" id="replied">

                   </div>
                   <div class="tab-pane active" id="closed">

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
});


</script>

@stop
