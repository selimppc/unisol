@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h1><strong>Welcome to ADm Test Subject Management </strong> </h1> <br>

<div class="row">
           <div class="col-sm-12">

               <div class="pull-right col-sm-4">
                              <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('common/adm_test_subject/create')}}" data-toggle="modal" data-target="#modal" >Add New Adm Test Subject</a>
               </div>
           </div>
</div>

      {{ Form::open(array('url' => 'common/adm_test_subject/batchDelete')) }}
          <table id="example" class="table table-striped  table-bordered"  >
             <thead>
                {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                    <br>
                    <tr>
                       <th><input name="id" id="checkbox" type="checkbox" class="checkbox" value=""></th>
                       <th>Title</th>
                       <th>Description</th>
                       <th>Priority</th>
                       <th>Action</th>
                    </tr>
             </thead>
                 <tbody>
                  @if(isset($adm_test_sbjct))
                         @foreach($adm_test_sbjct as $adm_test_subjct_mgt)
                               <tr>
                                   <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_test_subjct_mgt['id'] }}"></td>
                                   <td>{{ $adm_test_subjct_mgt->title }}</td>
                                   <td>{{ $adm_test_subjct_mgt->description }}</td>
                                   <td>{{ $adm_test_subjct_mgt->priority }}</td>
                                   <td>
                                       <a href="{{ URL::to('common/adm_test_subject/view/'.$adm_test_subjct_mgt->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                       <a class="btn btn-xs btn-default" href="{{ URL::to('common/adm_test_subject/edit/'.$adm_test_subjct_mgt->id) }}" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                       <a data-href="{{ URL::to('common/adm_test_subject/delete/'.$adm_test_subjct_mgt->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                   </td>
                               </tr>
                         @endforeach
                  @endif
                 </tbody>
          </table>
      {{form::close() }}


<div class="text-right">
    {{ $adm_test_sbjct->links() }}
</div>

   <p>&nbsp;</p><p>&nbsp;</p>

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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