@extends('layouts.master')
@section('sidebar')
  @include('academic::_sidebar')
@stop
@section('content')
<h4>{{$title}}</h4>

       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNew" >
         Add New Item
        </button>



     {{ Form::open(array('url' => 'academic/amw/batch/delete')) }}
        <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
              <th>
              <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
               </th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($datas as $value)
            <tr>
                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}">
                </td>
                <td>{{$value->title}}</td>

                <td>
                  <a data-href="{{ URL::to('academic/amw/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>

                   <a href="{{ URL::route('amw.edit', ['id'=>$value->id]) }}" class="subEdit btn btn-xs btn-default" data-toggle="modal" data-target="#edit-modal" href="" ><span class="glyphicon glyphicon-edit text-info"></span></a>

                   <a href="{{ URL::route('amw.show', ['id'=>$value->id])  }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a>
                </td>
            </tr>
            @endforeach
          </tbody>
          {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
    </table>
    {{ Form::close() }}

    {{ $datas->links() }}


{{---------------------------------------------}}
{{--Start all modal for amw--}}
{{---------------------------------------------}}

<!-- Add New Item Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add New Item</h4>
            </div>
            <div class="modal-body">

             {{ Form::open(array('url' => 'academic/amw/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}

               @include('academic::amw.mark_distribution_courses._form')

             {{ Form::close() }}


            </div>
            <div class="modal-footer">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit Item Modal -->

 <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                 <h4 class="modal-title">Edit Course Item</h4>
             </div>
             <div class="modal-body">


             </div>
             <div class="modal-footer">

             </div>
         </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->

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
                <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>

              </div>
        </div>
      </div>
    </div>


      <!-- Show Modal -->
      <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Show Course Item</h4>
            </div>
            <div class="modal-body">



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal" >Cencel</button>
            </div>
          </div>
        </div>
      </div>

{{--End all modal for amw--}}
{{---------------------------------------------}}

@stop