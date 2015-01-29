@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')




<div class="span8 well">
<table class="table table-striped table-bordered" id="myTable">
 <col width="50">
      <col width="180">
     <h4>Biographical Information</h4>

     <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/edit/' . $data->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>
                    <thead>


                        <tr>
                        <td>Father's Name</td>
                          <td>{{$data->fathers_name}}</td>
                        </tr>
                        <tr>
                        <td>Mother's Name</td>
                        <td>{{$data->mothers_name}}</td>
                        </tr>
                        <tr>
                        <td>Father's occupation</td>
                        <td>{{$data->fathers_occupation}}</td>
                        </tr>
                        <tr>
                        <td>Father's Phone</td>
                        <td>{{$data->fathers_phone}}</td>
                        </tr>
                        <tr>
                        <td>Freedom fighter</td>
                        <td>{{$data->freedom_fighter}}</td>
                        </tr>
                        <tr>
                        <td>Mother's occupation</td>
                        <td>{{$data->mothers_occupation}}</td>
                        </tr>
                        <tr>
                        <td>Mother's Phone</td>
                        <td>{{$data->mothers_phone}}</td>
                        </tr>
                        <tr>
                        <td>National_id</td>
                        <td>{{$data->national_id}}</td>
                        </tr>
                        <tr>
                        <td>driving_license</td>
                        <td>{{$data->driving_license}}</td>
                        </tr>
                        <tr>
                        <td>passport</td>
                        <td>{{$data->passport}}</td>
                        </tr>
                        <tr>
                        <td>place_of_birth</td>
                        <td>{{$data->place_of_birth}}</td>
                        </tr>
                        <tr>
                        <td>marital_status</td>
                        <td>{{$data->marital_status}}</td>
                        </tr>
                        <tr>
                        <td>nationality</td>
                        <td>{{$data->nationality}}</td>
                        </tr>
                        <tr>
                        <td>religion</td>
                        <td>{{$data->religion}}</td>
                        </tr>
                        <tr>
                        <td>signature</td>
                        <td>{{$data->signature}}</td>
                        </tr>
                        <tr>
                        <td>present_address</td>
                        <td>{{$data->present_address}}</td>
                        </tr>
                        <tr>
                        <td>parmanent_address</td>
                        <td>{{$data->parmanent_address}}</td>
                        </tr>




                  </thead>

        <tbody>



      {{--@foreach ($meta_data as $applicants)--}}
                 {{--<tr >--}}


             {{--<td>{{ $applicants->fathers_name }}</td>--}}
             {{--<td>{{ $applicants->mothers_name }}</td>--}}
             {{--<td>{{ $applicants->fathers_occupation }}</td>--}}
             {{--<td>{{ $applicants->fathers_phone }}</td>--}}
             {{--<td>{{ $applicants->freedom_fighter }}</td>--}}
             {{--<td>{{ $applicants->mothers_occupation }}</td>--}}
             {{--<td>{{ $applicants->mothers_phone }}</td>--}}
             {{--<td>{{ $applicants->national_id }}</td>--}}
             {{--<td>{{ $applicants->driving_license }}</td>--}}
             {{--<td>{{ $applicants->passport }}</td>--}}
             {{--<td>{{ $applicants->place_of_birth }}</td>--}}
             {{--<td>{{ $applicants->marital_status }}</td>--}}
             {{--<td>{{ $applicants->nationality }}</td>--}}
             {{--<td>{{ $applicants->religion }}</td>--}}
             {{--<td>{{ $applicants->signature }}</td>--}}
             {{--<td>{{ $applicants->present_address }}</td>--}}
             {{--<td>{{ $applicants->parmanent_address }}</td>--}}



        {{--</tr>--}}
      {{--@endforeach--}}

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