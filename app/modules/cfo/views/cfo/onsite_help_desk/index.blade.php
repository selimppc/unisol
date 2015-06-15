@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
 @include('layouts._sidebar_cfo')
@stop
@section('content')

<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('help-desk.create')}}" data-toggle="modal" data-target="#help-desk"><b>+Add New</b></a>

<div class="wrapper row-offcanvas row-offcanvas-left">

    <h3 class="page-header">Onsite Help Desk</h3>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" style="color:#800080">All</a></li>
                    <li><a href="#tab_2" data-toggle="tab"  style="color:orchid">OPEN</a></li>
                    <li><a href="#tab_3" data-toggle="tab"  style="color:darkgreen">SERVED</a></li>
                    <li><a href="#tab_4" data-toggle="tab"  style="color:firebrick">WAITING</a></li>
                    <li><a href="#tab_5" data-toggle="tab"  style="color:#0072b1">SERVING</a></li>
                    <li><a href="#tab_6" data-toggle="tab"  style="color:lightcoral">CLOSED</a></li>
                    <li><a href="#tab_7" data-toggle="tab"  style="color:#000000">MY DESK</a></li>
                </ul>
                <div class="tab-content">
                {{------------------Starts :STATUS -> ALL -----------------------------------------------------}}
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive"><p>&nbsp;</p>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <tr>
                                            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                            <th> Name</th>
                                            <th> Email </th>
                                            <th> Token Number </th>
                                            <th> Category</th>
                                            <th> Department</th>
                                            <th> Assigned To</th>
                                            <th> Status</th>
                                            <th> Action</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                   @if(isset($data))
                                      @foreach($data as $values)
                                         <tr>
                                            <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                                            <td>
                                               <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                                               class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                                               </a>
                                            </td>
                                            <td>{{$values->email}}</td>
                                            <td style="color:#800080">{{$values->token_number}}</td>
                                            <td>{{$values->relCfoCategory->title}}</td>
                                            <td>{{$values->relDepartment->title}}</td>
                                            <td>{{$values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name}}</td>
                                            <td>{{strtoupper($values->status)}}</td>
                                            <td>
                                               <a href="{{ URL::route('help-desk.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                               <a class="btn btn-xs btn-default" href="{{ URL::route('help-desk.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                               <a data-href="{{ URL::route('help-desk.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                            </td>
                                         </tr>
                                      @endforeach
                                   @endif
                                </tbody>
                            </table>
                        </div><!-- /.box -->
                    </div><!-- /.tab-pane -->
{{------------------Starts :STATUS -> OPEN -----------------------------------------------------}}
                    <div class="tab-pane" id="tab_2">
                        <div class="box-body table-responsive"><p>&nbsp;</p>

                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th> Name</th>
                                    <th> Email </th>
                                    <th> Token Number </th>
                                    <th> Category</th>
                                    <th> Department</th>
                                    <th> Assigned To</th>
                                    <th> Status</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(isset($status_open))
                                         @foreach($status_open as $values)
                                            <tr>
                                               <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                                               <td>
                                                  <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                                                  class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                                                  </a>
                                               </td>
                                               <td>{{$values->email}}</td>
                                               <td style="color:#800080">{{$values->token_number}}</td>
                                               <td>{{$values->relCfoCategory->title}}</td>
                                               <td>{{$values->relDepartment->title}}</td>
                                               <td>{{$values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name}}</td>
                                               <td>{{strtoupper($values->status)}}</td>
                                               <td>
                                                  <a href="{{ URL::route('help-desk.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                                  <a class="btn btn-xs btn-default" href="{{ URL::route('help-desk.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                                  <a data-href="{{ URL::route('help-desk.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                               </td>
                                            </tr>
                                         @endforeach
                                    @endif
                                </tbody>

                            </table>
                        </div>
                        <!-- /.box -->
                        <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('help-desk')}}" title="Back To Courses"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                        <p>&nbsp;</p>
                    </div><!-- /.tab-pane -->

 {{------------------Starts : STATUS -> WAITING -----------------------------------------------------}}
                    <div class="tab-pane" id="tab_4">
                        <div class="box-body table-responsive"><p>&nbsp;</p>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th> Name</th>
                                    <th> Email </th>
                                    <th> Token Number </th>
                                    <th> Category</th>
                                    <th> Department</th>
                                    <th> Assigned To</th>
                                    <th> Status</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(isset($status_wt))
                                        @foreach($status_wt as $values)
                                           <tr>
                                              <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                                              <td>
                                                 <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                                                 class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                                                 </a>
                                              </td>
                                              <td>{{$values->email}}</td>
                                              <td style="color:#800080">{{$values->token_number}}</td>
                                              <td>{{$values->relCfoCategory->title}}</td>
                                              <td>{{$values->relDepartment->title}}</td>
                                              <td>{{$values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name}}</td>
                                              <td>{{strtoupper($values->status)}}</td>
                                              <td>
                                                 <a href="{{ URL::route('help-desk.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                                 <a class="btn btn-xs btn-default" href="{{ URL::route('help-desk.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                                 <a data-href="{{ URL::route('help-desk.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                              </td>
                                           </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div><!-- /.box -->
                        <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('help-desk')}}" title="Back To Courses"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                        <p>&nbsp;</p>
                    </div><!-- /.tab-pane -->

{{------------------Starts :SERVED  -----------------------------------------------------}}
                   <div class="tab-pane " id="tab_3">
                       <div class="box-body table-responsive"><p>&nbsp;</p>
                           <table id="" class="table table-bordered table-striped">
                               <thead>
                               <tr>
                                   <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                   <th> Name</th>
                                   <th> Email </th>
                                   <th> Token Number </th>
                                   <th> Category</th>
                                   <th> Department</th>
                                   <th> Assigned To</th>
                                   <th> Status</th>
                                   <th> Action</th>
                               </tr>
                               </thead>
                               <tbody>
                                  @if(isset($status_srvd))
                                     @foreach($status_srvd as $values)
                                        <tr>
                                           <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                                           <td>
                                              <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                                              class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                                              </a>
                                           </td>
                                           <td>{{$values->email}}</td>
                                           <td style="color:#800080">{{$values->token_number}}</td>
                                           <td>{{$values->relCfoCategory->title}}</td>
                                           <td>{{$values->relDepartment->title}}</td>
                                           <td>{{$values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name}}</td>
                                           <td>{{strtoupper($values->status)}}</td>
                                           <td>
                                              <a href="{{ URL::route('help-desk.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                              <a class="btn btn-xs btn-default" href="{{ URL::route('help-desk.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                              <a data-href="{{ URL::route('help-desk.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                           </td>
                                        </tr>
                                     @endforeach
                                  @endif
                               </tbody>
                           </table>
                       </div><!-- /.box -->
                       <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('help-desk')}}" title="Back To Courses"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                       <p>&nbsp;</p>
                   </div><!-- /.tab-pane -->

{{------------------Starts :Serving  -----------------------------------------------------}}
                   <div class="tab-pane" id="tab_5">
                      <div class="box-body table-responsive"><p>&nbsp;</p>
                          <table id="" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                 <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                 <th> Name</th>
                                 <th> Email </th>
                                 <th> Token Number </th>
                                 <th> Category</th>
                                 <th> Department</th>
                                 <th> Assigned To</th>
                                 <th> Status</th>
                                 <th> Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                 @if(isset($srving))
                                      @foreach($srving as $values)
                                         <tr>
                                            <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                                            <td>
                                               <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                                               class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                                               </a>
                                            </td>
                                            <td>{{$values->email}}</td>
                                            <td style="color:#800080">{{$values->token_number}}</td>
                                            <td>{{$values->relCfoCategory->title}}</td>
                                            <td>{{$values->relDepartment->title}}</td>
                                            <td>{{$values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name}}</td>
                                            <td>{{strtoupper($values->status)}}</td>
                                            <td>
                                               <a href="{{ URL::route('help-desk.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                               <a class="btn btn-xs btn-default" href="{{ URL::route('help-desk.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                               <a data-href="{{ URL::route('help-desk.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                            </td>
                                         </tr>
                                      @endforeach
                                 @endif
                              </tbody>
                          </table>
                      </div><!-- /.box -->
                      <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('help-desk')}}" title="Back To Courses"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                      <p>&nbsp;</p>
                   </div><!-- /.tab-pane -->

{{------------------Starts :Status ->Closed -----------------------------------------------------}}
                   <div class="tab-pane" id="tab_6">
                       <div class="box-body table-responsive"><p>&nbsp;</p>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th> Name</th>
                                    <th> Email </th>
                                    <th> Token Number </th>
                                    <th> Category</th>
                                    <th> Department</th>
                                    <th> Assigned To</th>
                                    <th> Status</th>
                                    <th> Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @if(isset($closed_status))
                                      @foreach($closed_status as $values)
                                           <tr>
                                              <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                                              <td>
                                                 <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                                                 class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                                                 </a>
                                              </td>
                                              <td>{{$values->email}}</td>
                                              <td style="color:#800080">{{$values->token_number}}</td>
                                              <td>{{$values->relCfoCategory->title}}</td>
                                              <td>{{$values->relDepartment->title}}</td>
                                              <td>{{$values->relUser->relUserProfile->first_name.' '.$values->relUser->relUserProfile->middle_name.' '.$values->relUser->relUserProfile->last_name}}</td>
                                              <td>{{strtoupper($values->status)}}</td>
                                              <td>
                                                 <a href="{{ URL::route('help-desk.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                                 <a class="btn btn-xs btn-default" href="{{ URL::route('help-desk.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                                 <a data-href="{{ URL::route('help-desk.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                              </td>
                                           </tr>
                                      @endforeach
                                   @endif
                                </tbody>
                            </table>
                       </div><!-- /.box -->
                       <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('help-desk')}}" title="Back To Courses"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                       <p>&nbsp;</p>
                   </div><!-- /.tab-pane -->

{{------------------Starts :  My Desk -----------------------------------------------------}}
                   <div class="tab-pane" id="tab_7">
                        <div class="box-body table-responsive"><p>&nbsp;</p>
                        <h4><b style="color: teal">{{isset($assigned_user)?$assigned_user->relUserProfile->first_name.' '.$assigned_user->relUserProfile->middle_name.' '.$assigned_user->relUserProfile->last_name:''}}'s Desk</b></h4>

                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                   <tr>
                                       <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                       <th> Name </th>
                                       <th> Email </th>
                                       <th> Token Number </th>
                                       <th> Category</th>
                                       <th> Department</th>
                                       <th> Assigned By</th>
                                       <th> Status</th>
                                       <th> Action</th>
                                   </tr>
                                </thead>
                                <tbody>
                                     @if(isset($self_desk))
                                         @foreach($self_desk as $values)
                                              <tr>
                                                 <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                                                 <td>
                                                    <a href="{{URL::route('help-desk.show',['id'=>$values->id])}}" data-toggle="modal" data-target="#help-desk"
                                                    class="btn-link" title="View Details" style="color:#800080">{{$values->name}}
                                                    </a>
                                                 </td>
                                                 <td>{{$values->email}}</td>
                                                 <td style="color:#800080">{{$values->token_number}}</td>
                                                 <td>{{$values->relCfoCategory->title}}</td>
                                                 <td>{{$values->relDepartment->title}}</td>
                                                 <td>{{isset($values->created_by)? User::FullName(['assigned_by_user'=>$values->created_by]):''}}</td>
                                                 <td>{{strtoupper($values->status)}}</td>
                                                 <td>
                                                    <a href="{{ URL::route('help-desk.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                                    <a class="btn btn-xs btn-default" href="{{ URL::route('help-desk.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#help-desk" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                                    <a data-href="{{ URL::route('help-desk.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                                 </td>
                                              </tr>
                                         @endforeach
                                     @endif
                                </tbody>
                            </table>
                        </div><!-- /.box -->
                        <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('help-desk')}}" title="Back To Courses"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a>
                        <p>&nbsp;</p>
                   </div><!-- /.tab-pane -->

                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </div> <!-- /.row -->
    <!-- END CUSTOM TABS -->
</div><!-- ./wrapper -->

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
