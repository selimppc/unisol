@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h1><strong>ADm Test Subject Management </strong> </h1> <br>

<div class="row">
           <div class="col-sm-12">

               <div class="pull-right col-sm-4">
                   <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('admission/amw/create-admission-test-subject')}}" data-toggle="modal" data-target="#modal" >Add Admission Subject</a>
               </div>
           </div>
</div>

      {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}
          <table id="example" class="table table-striped  table-bordered"  >
             <thead>
                {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                    <br>
                    <tr>
                       <th><input name="id" id="checkbox" type="checkbox" class="checkbox" value=""></th>
                       <th>Title</th>
                       <th>Priority</th>
                       <th>Action</th>
                    </tr>
             </thead>
                 <tbody>
                     @foreach($admission_test_subject as $adm_test_mgt)
                           <tr>
                               <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_test_mgt['id'] }}"></td>
                               <td>{{ $adm_test_mgt->title }}</td>
                               <td>{{ $adm_test_mgt->priority }}</td>

                               <td>
                                  <a href="{{ URL::route('admission.amw.view-admission-test-subject', ['id'=>$adm_test_mgt->id])  }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>
                                  <a href="{{ URL::route('admission.amw.edit-admission-test-subject', ['id'=>$adm_test_mgt->id])  }}" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>
                               </td>
                           </tr>
                     @endforeach
                 </tbody>
          </table>
      {{form::close() }}

   <p>&nbsp;</p><p>&nbsp;</p>

   <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog" style="z-index:1050">
             <div class="modal-content">

            </div>
           </div>
   </div>

@stop