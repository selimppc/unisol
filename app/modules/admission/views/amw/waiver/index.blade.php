@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_amw')
@stop

@section('content')


 <div class="box box-solid ">
        <div class="box box-info">
              <div class="box-header">
              <h3 class="box-title">Waiver</h3>
                  <div class="box-tools pull-right">
                       <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('admission/amw/waiver/create')}}" data-toggle="modal" data-target="#waiverModal" style="color: #ffffff"><b>Add Waiver</b></a>
                  </div>
              <p>&nbsp;</p>
              </div>
              <div class="box-body">
                   <div class="row">
                       <div class="col-lg-12">
                       {{ Form::open(array('url' => 'admission/amw/waiver/batch_delete')) }}
                          <table id="example" class="table table-bordered ">
                             <thead>
                                 <tr>
                                     <th>
                                         <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                                     </th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Waiver Type</th>
                                    <th>Is Percentage ?</th>
                                    <th>Amount</th>
                                    {{--<th>Billing Item</th>--}}
                                    <th>Action</th>
                                 </tr>
                             </thead>
                            <tbody>
                              @if(isset($waiver_model))
                                @foreach($waiver_model as $value)
                                <tr>
                                    <td><input type="checkbox" name="ids[]"  class="myCheckbox" value="{{ $value->id }}">
                                    </td>
                                    <td>{{ $value['title'] }}</td>
                                    <td>{{ $value['description'] }}</td>
                                    <td>{{ $value['waiver_type'] }}</td>
                                    <td>{{ $value['is_percentage'] == 1 ? 'Yes' : 'No' }}</td>
                                    <td>{{ $value['amount'] }}</td>
                                    {{--<td> {{$value['relBillingDetails']['relBillingItem']['title'] }} </td>--}}

                                    <td>
                                         <a href="{{ URL::to('admission/amw/waiver/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#waiverModal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                         <a class="btn btn-xs btn-default" href="{{ URL::to('admission/amw/waiver/edit/'.$value->id) }}" data-toggle="modal" data-target="#waiverModal" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                         <a data-href="{{ URL::to('admission/amw/waiver/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>

                                    </td>
                                </tr>
                                @endforeach
                              @endif
                            </tbody>
                       {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                          </table>
                       {{ Form::close() }}
                       </div>
                   </div>
              </div>
        </div>

 </div>
<div class="text-right">
    {{--{{ $waiver_model->links() }}--}}
</div>

{{----------------------------------------------Modal : degreeGroupModal--------------------------------------------------------------------------}}
<div class="modal fade" id="waiverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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