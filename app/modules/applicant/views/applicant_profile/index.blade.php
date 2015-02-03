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
                            <th>Date of Birth</th>
                               <td>{{$profile->date_of_birth}}
                            </td>
                          </tr>

                          {{--<tr>--}}
                            {{--<td>birth_place</td>--}}
                              {{--<td>{{$profile->birth_place}}--}}
                          {{--</td>--}}
                         {{--</tr>--}}

                          <tr>
                             <th>Gender</th>
                               <td>{{$profile->gender}}
                             </td>
                         </tr>

                         <tr>
                                  <th>Profile picture</th>

                                  <td>{{ HTML::image('images/applicant_profile/' . $profile->profile_image) }}

                                  <a class=" btn btn-sm btn-info" href="{{ URL::to('applicant/profile_image/edit/' . $profile->id ) }}" data-toggle="modal" data-target="#changeImageModal" >changeImage...</a>
                                   {{--<a href="{{URL::to('applicant/profile_image/edit/'.$profile->profile_image) }}">Change Image</a>--}}
                                  </td>

                                  </td>
                              </tr>

                          <tr>
                               <th>City</th>
                                 <td>{{$profile->city}}
                               </td>
                           </tr>

                            <tr>
                              <th>State</th>
                                <td>{{$profile->state}}
                              </td>
                          </tr>
                           <tr>
                             <th>Country</th>
                               <td>{{$profile->country}}
                             </td>
                         </tr>

                         <tr>
                              <th>Zip Code</th>
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
        <h3 class="modal-title" id="myModalLabel"></h3>
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
        {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>--}}
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      </div>

      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>


@stop