@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')




<div class="span8 well">
<table class="table table-striped table-bordered" id="myTable">

     <h4>Extra-Curricular Activities </h4>

      <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/extra_curricular/edit/' . $data->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>
                    <thead>


                         <tr>
                            <td>title</td>
                               <td>{{$data->title}}
                            </td>
                          </tr>

                          <tr>
                            <td>Description</td>
                              <td>{{$data->description}}
                          </td>
                         </tr>

                          <tr>
                             <td>Achievement</td>
                               <td>{{$data->achivement}}
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








@stop