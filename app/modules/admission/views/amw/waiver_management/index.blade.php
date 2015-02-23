@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')

<h3>Waiver Management </h3>

<a class="pull-right btn btn-sm btn-info" href="{{URL::route('waiver_manage.create')}}" data-toggle="modal" data-target="#addModal" >Add Waiver</a>

 <p>&nbsp;</p>
 <p>&nbsp;</p>
{{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
<table id="example1" class="table table-bordered table-striped">

    <col width="150">
    <col width="100">
    <col width="100">
    <col width="100">
    <col width="120">
    <col width="140">


    <thead>
       <tr>

           <th>Title</th>
           <th>Type</th>
           <th>Percentage</th>
           <th>Amount</th>
           <th>Billing Item </th>
           <th>Action</th>

       </tr>
    </thead>
  <tbody>

      @foreach($waiver_model as $value)


          <tr>
          <td>{{ $value->title }}</td>
          <td></td>
          <td>{{ $value->is_percentage == 1 ? 'Yes' : 'No' }}</td>

          <td>{{  $value->amount }}</td>
          <td></td>

          {{--<td>{{ $value->relUser->relUserProfile->first_name.' '.$value->relUser->relUserProfile->last_name }}</td>--}}
          <td>
               <a href="{{ URL::route('waiver_manage.show', $value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#addModal"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>
               <a class="btn btn-xs btn-default" href="{{ URL::route('waiver_manage.edit',$value->id) }}" data-toggle="modal" data-target="#addModal" ><span class="glyphicon glyphicon-edit"></span></a>
                  {{----}}
          </td>


          </tr>
      @endforeach

  </tbody>

</table>
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

{{--------Pagination Link--------------------------}}
 <div class="pull-right paginate-button">
    {{$waiver_model->links()}}
 </div>

{{---------------------------------------------------Modals-----------------------------------------------}}
 <!-- Modal :: add Information -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">

         </div>
     </div>
</div>



@stop

