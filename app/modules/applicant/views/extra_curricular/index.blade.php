@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')


<div class="span8 well">
<table class="table table-striped table-bordered" id="myTable">

     <h4>Extra-Curricular Activities </h4>
      @if($data != null)
                 {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/profile/edit/' . $profile->id  ) }}" data-toggle="modal" data-target="#myeditModal" >Edit Profile</a>--}}
      <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/extra_curricular/edit/' . $data->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>
       @else
      <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/extra_curricular/create')}}" data-toggle="modal" data-target="#addModal" >Add </a>

       @endif
                    <thead>


                         <tr>
                            <td>title</td>

                               <td>{{ $data != null ? $data->title : null }}
                            </td>
                          </tr>

                          <tr>
                            <td>Description</td>
                              <td>
                              {{ $data != null ? $data->description : null }}
                          </td>
                         </tr>

                          <tr>
                             <td>Achievement</td>
                               <td>
                               {{ $data != null ? $data->achivement : null }}
                             </td>
                         </tr>




           </thead>

        <tbody>


     <br><br>
     {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">--}}
           {{--Edit--}}
     {{--</button>--}}

        </tbody>
    </table>

</div>


<!-- Modal : edit -->
<div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>
      <div class="modal-body">

      </div>


      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

{{--Model : Add Data--}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
 </div>






@stop