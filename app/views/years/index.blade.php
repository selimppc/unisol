@extends('layouts.master')

@section('sidebar')
    @include('subject.sidebar')
@stop

@section('content')

<h1>{{$title}}</h1>
    <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-sm-10" style="background: #FFFFFF">
              <div class="panel-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px">
                 Add New Subject
                </button>


        {{ Form::open(array('url' => '')) }}
        <table class="table table-bordered" id="myTable">

          <thead>
              <th>
              <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
               </th>
              <th>Id</th>
              <th>YearsName</th>
              <th>Description</th>
              <th colspan="2" width="120px">Action</th>
          </thead>
          <tbody class="searchBody">

          {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

            @foreach ($datas as $value)
              <tr>
                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}">
                </td>
                 <td>{{$value->id}} </td>
                 <td >{{ $value->title }} </td>
                 <td>{{ $value->description }} </td>
                 <td>
                   <a data-href="{{ URL::to('subject/delete/'.$value->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>

                   <a data-id="{{ $value->id }}" class="subEdit btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-edit" href="" ><span class="glyphicon glyphicon-edit text-info"></span></a>
                   
                   <a data-id="{{ $value->id }}" class="subDetails btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-details" href="" ><span class="glyphicon glyphicon-list-alt text-info"></span></a>
                  
                 </td>
              </tr>
            @endforeach

          </tbody>

        </table>

       {{ Form::close() }}

       {{ $datas->links() }}

   </div>
  </div>
  </div>
</div>
    <!-- Modal for Edit -->
<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Subject</h4>
      </div>
      <div class="modal-body edit-modal">

          {{ Form::open(array('url' => '', 'method' =>'post', 'role'=>'form','files'=>'true', 'class' => 'updateForm')) }}
              @include('subject._form')
           <!--   <button type="button" class="btn btn-default" data-dismiss="modal" >Cencel</button> -->
             
        <!-- To refresh page -->
             <a href="{{URL::to('')}}" class="btn btn-default">Close </a> 
          {{ Form::close() }}

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>


 <!-- Modal for details view cell -->
<div class="modal fade" id="confirm-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">View Subject</h4>
      </div>
      <div class="modal-body details-modal">                  
        <p>Department: <span class="department"></span></p>
        <p>Title: <span class="title"></span></p>
        <p>Description:  <span class="description"></span></p>
      </div>
      <div class="modal-footer">
      </div>
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
                <button type="button" class="btn btn-default close" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>

              </div>
        </div>
      </div>
    </div>

    <!-- Modal add new subject -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Subject</h4>
                </div>
                <div class="modal-body">
                   {{ Form::open(array('url' => 'years/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}

                       @include('years._form')

                  <button type="button" class="btn btn-danger close" data-dismiss="modal">Cencel</button>
                    {{ Form::close() }}

                </div>
                <div class="modal-footer">                  
                </div>
            </div>
        </div>
    </div>


@stop