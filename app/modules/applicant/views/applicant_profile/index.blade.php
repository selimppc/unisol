@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')

<div class="span8 well">
<table class="table table-striped table-bordered" id="myTable">

     <h4>Applicant Proifle </h4>

      <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/profile/edit/' . $profile->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>
                    <thead>


                         <tr>
                            <td>Date of Birth</td>
                               <td>{{$profile->date_of_birth}}
                            </td>
                          </tr>

                          {{--<tr>--}}
                            {{--<td>birth_place</td>--}}
                              {{--<td>{{$profile->birth_place}}--}}
                          {{--</td>--}}
                         {{--</tr>--}}

                          <tr>
                             <td>Gender</td>
                               <td>{{$profile->gender}}
                             </td>
                         </tr>

                         <tr>
                                  <td>Profile picture</td>

                                  <td>{{ HTML::image('images/applicant_profile/' . $profile->profile_image) }}

                                  <a class=" btn btn-sm btn-info" href="{{ URL::to('applicant/profile_image/edit/' . $profile->id ) }}" data-toggle="modal" data-target="#changeImageModal" >changeImage...</a>
                                   {{--<a href="{{URL::to('applicant/profile_image/edit/'.$profile->profile_image) }}">Change Image</a>--}}
                                  </td>

                                  </td>
                              </tr>

                          <tr>
                               <td>City</td>
                                 <td>{{$profile->city}}
                               </td>
                           </tr>

                            <tr>
                              <td>State</td>
                                <td>{{$profile->state}}
                              </td>
                          </tr>
                           <tr>
                             <td>Country</td>
                               <td>{{$profile->country}}
                             </td>
                         </tr>

                         <tr>
                              <td>Zip Code</td>
                                <td>{{$profile->zip_code}}
                              </td>
                         </tr>

           </thead>

        <tbody>

     <br><br>
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

{{--modal: change image--}}

<div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">change Image</h4>
      </div>
      <div class="modal-body">
      </div>

      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>


@stop