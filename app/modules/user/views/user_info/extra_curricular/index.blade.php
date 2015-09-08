@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @if($user_role=="amw")
       @include('layouts._sidebar_amw')
    @elseif($user_role=="faculty")
       @include('layouts._sidebar_faculty')
    @elseif($user_role=="student")
       @include('layouts._sidebar_student')
    @elseif($user_role=="hr")
       @include('layouts._sidebar_hr')
    @elseif($user_role=="librarian")
       @include('layouts._sidebar_librarian')
    @elseif($user_role=="cfo")
       @include('layouts._sidebar_cfo')
    @endif
@stop
@section('content')
    <!-- left column -->
    <div class="background-color">
        <section class="col-lg-12 background-color">
            <p>&nbsp;</p>
            <div class="col-lg-3"><b class="color-text-black">Extra Curricular Activities</b><br>
            </div>
            <div class="col-lg-9 div-background-color">
            <a class="pull-right btn btn-xs btn-default" href="{{ URL::route('user/extra-curricular/create')}}" data-toggle="modal" data-target="#addModal" ><b><ins>+ Add</ins></b></a>

                <table class="table table-striped  table-bordered">
                    <thead>
                        <tr>
                            <th> Title</th>
                            <th> Description </th>
                            <th> Achievement</th>
                            <th> Certificate Medal </th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($extra_cur))
                        @foreach($extra_cur as $value)
                         <tr>
                            <td>{{$value->title}}</td>
                            <td>{{$value->description}}</td>
                            <td>{{$value->achievement}}</td>
                            <td>
                                @if($value->certificate_medal == Null)
                                    <a href="{{ URL::route('user/extra-curricular/create/certificate-medal',['id'=>$value->id])}}" data-toggle="modal" data-target="#changeImageModal">
                                       <ins>Add</ins>
                                    </a>
                                @else
                                    <a href="{{ URL::route('user/extra-curricular/certificate-medal',['id'=>$value->id])}}" data-toggle="modal" data-target="#changeImageModal">
                                       <ins>View</ins>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-xs btn-default" href="{{ URL::route('user/extra-curricular/edit',['id'=>$value->id])}}" data-toggle="modal" data-target="#addModal" style="font-size: 12px">Edit</a>
                            </td>
                         </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </section>
        <p>&nbsp;</p>
        <hr>
    </div>
<!-- Modal  -->
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
 </div>

 {{--modal: change image--}}
     <div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">

             </div>
         </div>
     </div>

     <!-- Modal : edit -->
     <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" style="z-index:1050">
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

      <!-- Modal : add supporting docs -->
      <div class="modal fade" id="addgoalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
              </div>
          </div>
      </div>
      <!-- Modal : add misc info -->
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
            </div>
         </div>
      </div>

     <style>
     hr {
         display: block;
         margin-top: 0.5em;
         margin-bottom: 0.5em;
         margin-left: auto;
         margin-right: auto;
         border-style: inset;
         border-width: 1px;
     }
     </style>



@stop

