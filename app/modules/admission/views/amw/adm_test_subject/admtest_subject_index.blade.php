@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<h1><strong>Welcome to ADm Test Subject Management </strong> </h1> <br>

<div class="row">
           <div class="col-sm-12">

               <div class="pull-right col-sm-4">
                       <div class="btn-group" style="margin-right: 10px">
                           <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                      data-target="#addAdmissionSubjectModal">
                                        Add Admission Subject
                           </button>
                       </div>
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
                       <th>Action</th>
                    </tr>
             </thead>
                 <tbody>
                     @foreach($subject_management as $adm_test_mgt)
                           <tr>
                               <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $adm_test_mgt['id'] }}"></td>
                               <td>{{ $adm_test_mgt->title }}</td>

                               <td>

                                  <a href="{{ URL::route('admission_test.amw.view_subject_management', ['id'=>$adm_test_mgt->id])  }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>
                                  <a href="{{ URL::route('admission_test.amw.edit_subject_management', ['id'=>$adm_test_mgt->id])  }}" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>

                               </td>
                           </tr>
                     @endforeach
                 </tbody>
          </table>
      {{form::close() }}

   <p>&nbsp;</p><p>&nbsp;</p>

@stop