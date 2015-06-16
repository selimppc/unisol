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
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" style="color:#800080">All</a></li>
                    <li><a href="#tab_2" data-toggle="tab"  style="color:darkgreen">New</a></li>
                    <li><a href="#tab_3" data-toggle="tab"  style="color:firebrick">OPEN</a></li>
                    <li><a href="#tab_4" data-toggle="tab"  style="color:dodgerblue">REPLIED</a></li>
                    <li><a href="#tab_5" data-toggle="tab"  style="color:#000000">CLOSED</a></li>
                </ul>
                <div class="tab-content">
                   {{------------------Starts :STATUS -> ALL -----------------------------------------------------}}
                       <div class="tab-pane active" id="tab_1">
                           <div class="box-body table-responsive"><p>&nbsp;</p>
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
                                                      <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                  @else
                                                      <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                      <a href="{{URL::route('support-head.reply',['id'=>$values->id])}}" class="btn btn-info btn-xs" >Reply</a>
                                                  @endif
                                                  </td>
                                              </tr>
                                          @endforeach
                                      @endif
                                   </tbody>
                               </table>
                               <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('help-desk')}}" title="Back To Courses"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                               <p>&nbsp;</p>
                           </div><!-- /.box -->
                       </div><!-- /.tab-pane -->
                   {{------------------Starts :Status ->new -----------------------------------------------------}}

                       <div class="tab-pane" id="tab_2">
                          <div class="box-body table-responsive"><p>&nbsp;</p>
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
                                     @if(isset($new_data))
                                         @foreach($new_data as $values)
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
                                                     <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                 @else
                                                     <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                     <a href="{{URL::route('support-head.reply',['id'=>$values->id])}}" class="btn btn-info btn-xs" >Reply</a>
                                                 @endif
                                                 </td>
                                             </tr>
                                         @endforeach
                                     @endif
                                  </tbody>
                              </table>
                              <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('support-head.index')}}" title="Back To support-head"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                              <p>&nbsp;</p>
                          </div><!-- /.box -->
                       </div><!-- /.tab-pane -->
                   {{------------------Starts :  Open -----------------------------------------------------}}
                      <div class="tab-pane" id="tab_3">
                         <div class="box-body table-responsive"><p>&nbsp;</p>
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
                                    @if(isset($open_data))
                                        @foreach($open_data as $values)
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
                                                    <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                @else
                                                    <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                    <a href="{{URL::route('support-head.reply',['id'=>$values->id])}}" class="btn btn-info btn-xs" >Reply</a>
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                 </tbody>
                             </table>
                             <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('support-head.index')}}" title="Back To support-head"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                             <p>&nbsp;</p>
                         </div><!-- /.box -->
                      </div><!-- /.tab-pane -->
                   {{------------------Starts : Replied -----------------------------------------------------}}

                      <div class="tab-pane" id="tab_4">
                           <div class="box-body table-responsive"><p>&nbsp;</p>
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
                                      @if(isset($replied_data))
                                          @foreach($replied_data as $values)
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
                                                      <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                  @else
                                                      <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                      <a href="{{URL::route('support-head.reply',['id'=>$values->id])}}" class="btn btn-info btn-xs" >Reply</a>
                                                  @endif
                                                  </td>
                                              </tr>
                                          @endforeach
                                      @endif
                                   </tbody>
                               </table>
                               <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('support-head.index')}}" title="Back To support-head"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                               <p>&nbsp;</p>
                           </div><!-- /.box -->

                      </div><!-- /.tab-pane -->

                   {{------------------Starts :  Closed -----------------------------------------------------}}
                      <div class="tab-pane" id="tab_5">
                         <div class="box-body table-responsive"><p>&nbsp;</p>
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
                                    @if(isset($closed_data))
                                        @foreach($closed_data as $values)
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
                                                    <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                @else
                                                    <a href="{{ URL::route('support-head.show',['id'=>$values->id]) }}" class="btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#support" style="font-size: 12px">View</a>
                                                    <a href="{{URL::route('support-head.reply',['id'=>$values->id])}}" class="btn btn-info btn-xs" >Reply</a>
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                 </tbody>
                             </table>
                             <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('support-head.index')}}" title="Back To support-head"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                             <p>&nbsp;</p>
                         </div><!-- /.box -->

                      </div><!-- /.tab-pane -->
                   {{------------------------End :tabs----------------------------------------------------------------}}
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
</script>

@stop
