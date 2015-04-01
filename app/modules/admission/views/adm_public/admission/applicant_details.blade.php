@extends('layouts.layout')
 @section('sidebar')
   @include('layouts._sidebar_applicant')
 @stop
@section('content')
{{---------------------------------------------Data Table:admission on degree :Starts-----------------------------------------------------------------}}
 <div class="box box-solid ">
     <div class="box-header">
     </div>
     <div class="box box-info">
              <div class="box-header">
              <h3 class="box-title">Admission On</h3>
              <div class="box-tools pull-right">
                   <button class="btn btn-info btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                   <button class="btn btn-info btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <p>&nbsp;</p>
              </div>
              <div class="box-body">
                   <div class="row">

                       <div class="col-lg-12">

                              <table class="table table-striped table-bordered">
                                  @if (isset($batch_applicant))
                                        <tbody>

                                            <tr>
                                                <th rowspan="100%" style="vertical-align: middle"><b style="font-size: medium">Degree Name</b></th>
                                            </tr>

                                                @foreach($batch_applicant as $value)

                                                    <tr>
                                                         <td class="col-lg-10">
                                                               <a href="{{ URL::route('admission.admission.test_details',
                                                                   ['id' => $value->id]) }}">
                                                                   {{ $value->relBatch->relDegree->title }}
                                                               </a>
                                                         </td>
                                                    </tr>
                                                @endforeach
                                        </tbody>
                                  @else
                                        <div class="col-xs-12" style="text-align: center;">
                                             <span class="btn btn-xs btn btn-info" style="color:#ffffff;">No data found !</span>
                                        </div>
                                  @endif
                              </table>
                       </div>
                   </div>
              </div>

              <div class="box-footer clearfix">
              <a class="pull-right btn btn-xs btn-info" href="{{ URL::route('admission.public.add-degree' )}}" data-toggle="modal" data-target="#addDegreeModal"> Add more degree</a>

                  {{--<button class="pull-right btn btn-xs btn-info" data-toggle="modal" data-target="#addDegreeModal">Add more degree</button>--}}
              </div>
     </div>
     {{--</section>--}}
 </div>

{{-----------------------------------Data Table : admission on  degree Starts Ends---------------------------------------------------------------------------}}

{{-----------------------------------Applicant's Profile:Personal Information starts--------------------------------------------------------}}

<div class="box  box-info">

    <div class="box-header">
        <h5 class="box-title" style="color: orangered; font-size: 14px;">Before proceeding to checkout please complete your Profile and Academic Record :: To checkout click on the button >> "Next"</h5>
        <div class="box-tools pull-right">
            <a class="pull-right btn btn-xs btn-success"  href="{{ URL::route('admission.adm_checkout')}}"><b style="color: #ffffff;"> Next </b> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

          <section class="col-lg-6 connectedSortable">

                    <p>&nbsp;</p>

                    <div class="box box-info">
                         <div class="box-header">
                             <h3 class="box-title">Personal Information</h3>
                             <!-- tools box -->
                             <div class="pull-right box-tools">
                                 <button class="btn btn-info btn-xs" data-widget="remove" data-toggle="tooltip" ><i class="fa fa-times"></i></button>
                             </div><!-- /. tools -->
                         </div>
                             <div class="box-body">
                                  <div class="row">
                                      <div class="col-lg-4">
                                              @if(isset($applicant_personal_info))
                                                  {{ HTML::image('applicant_images/'.$applicant_personal_info->profile_image) }}
                                              @endif
                                      </div>
                                      <div class="col-lg-8">
                                          <table>
                                          @if($applicant_personal_info != null)

                                                <a style="margin-left:-21%" class="pull-right btn btn-default" href="{{ URL::to('applicant/profile/edit/' . $applicant_personal_info->id  ) }}" data-toggle="modal" data-target="#addDegreeModal" >Edit</a>
                                            @else
                                                <a style="margin-left:-21%" class="pull-right btn btn-default" href="{{ URL::to('applicant/profile/create')}}" data-toggle="modal" data-target="#addDegreeModal" >Add Profile Information</a>

                                          @endif
                                                  @if(isset($applicant_personal_info))
                                                         <tr>
                                                             <th class="col-lg-6">Phone</th>
                                                             <td>{{$applicant_personal_info->phone}}</td>
                                                         </tr>

                                                         <tr>
                                                             <th class="col-lg-6">Date of Birth</th>
                                                             <td>{{$applicant_personal_info->date_of_birth}}</td>
                                                         </tr>

                                                         <tr>
                                                             <th class="col-lg-6">Place of Birth</th>
                                                             <td>{{$applicant_personal_info->place_of_birth}}</td>
                                                         </tr>

                                                         <tr>
                                                             <th class="col-lg-6">Gender</th>
                                                             <td>{{$applicant_personal_info->gender}}</td>
                                                         </tr>

                                                         <tr>
                                                              <th class="col-lg-6">City</th>
                                                              <td>{{$applicant_personal_info->city}}</td>
                                                         </tr>

                                                         <tr>
                                                              <th class="col-lg-6">State</th>
                                                              <td>{{$applicant_personal_info->state}}</td>
                                                         </tr>

                                                         <tr>
                                                              <th class="col-lg-6">Country</th>
                                                              <td>{{$applicant_personal_info->relCountry->title}}</td>
                                                         </tr>

                                                  @else
                                                      {{"No Profile data found !"}}
                                                  @endif



                                          </table>
                                      </div>
                                  </div>
                             </div>
                             <p>&nbsp;</p><p>&nbsp;</p><br>
                             {{--<div class="box-footer clearfix">--}}
                                  {{--<a class="pull-right btn btn-default"  href="{{url::to('admission/public/admission/add-applicant-acm-docs')}}" data-toggle="modal" data-target="#addDegreeModal"><b></b> Add Profile </a>--}}
                             {{--</div>--}}
                    </div>
                    <p>&nbsp;</p>
                    <div class="box box-info">
                         <div class="box-header">
                                <h3 class="box-title">Academic Information</h3>

                                <div class="pull-right box-tools">
                                    <button class="btn btn-info btn-xs" data-widget="remove" data-toggle="tooltip" ><i class="fa fa-times"></i></button>
                                </div><!-- /. tools -->
                         </div>

                             <div class="box-body">
                                  <div class="row">

                                      <div class="col-lg-12">
                                         <table class="table  table-bordered">
                                               <thead>
                                                      <tr>
                                                         <th width="3%"> Education Level</th>
                                                         <th width="5%">Board / University</th>
                                                         <th width="2%">Passing Year</th>
                                                         <th width="5%">Result</th>
                                                         <th >Docs</th>
                                                         <th width="3%">AC</th>
                                                      </tr>
                                               </thead>
                                                    <tbody >
                                                         @if(isset($applicant_acm_records))
                                                            @foreach($applicant_acm_records as $value)
                                                               <tr>
                                                                    <td>{{($value->level_of_education )}}</td>
                                                                    <td>{{ $value->board_university}}</td>
                                                                    <td>{{ $value->year_of_passing}}</td>
                                                                    <td>
                                                                         @if($value->result_type =='division')
                                                                         {{ $value->result }}
                                                                         @else
                                                                         {{$value->gpa}}
                                                                         @endif
                                                                    </td>
                                                                    <td>
                                                                       <a style="color:navy" class="btn btn-xs btn-default" href="{{URL::route('admission.public.applicant_certificate',['id'=>$value->id])}}" data-toggle="modal" data-target="#addDegreeModal">Certificate</a>
                                                                       <a style="color:navy" class="pull-right btn btn-xs btn-default" href="{{URL::route('admission.public.applicant_transcript',['id'=>$value->id])}}" data-toggle="modal" data-target="#addDegreeModal">Transcript</a>
                                                                     </td>
                                                                     <td>
                                                                    <a href="{{ URL::route('admission.public.edit-applicant-acm-docs',['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#addDegreeModal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-edit"></span></a>
                                                                    <a data-href="{{ URL::route('admission.public.delete-applicant-acm-docs',['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>

                                                                    </td>
                                                               </tr>

                                                            @endforeach
                                                         @else
                                                              {{"No Academic Records found !"}}
                                                         @endif
                                                    </tbody>

                                         </table>
                                      </div>
                                  </div>
                             </div>
                             <div class="box-footer clearfix">
                                 <a class="pull-right btn btn-default"  href="{{url::to('admission/public/admission/add-applicant-acm-docs')}}" data-toggle="modal" data-target="#addDegreeModal"><b></b> Add Academic Records </a>
                             </div>
                    </div>

               <p>&nbsp;</p>
               <p>&nbsp;</p>
         </section>
         <section class="col-lg-6 connectedSortable">
         <p>&nbsp;</p>
            <div class="box box-info">
                 <div class="box-header">
                     <h3 class="box-title">Biographical Information</h3>
                     <!-- tools box -->
                     <div class="pull-right box-tools">
                         <button class="btn btn-info btn-xs" data-widget="remove" data-toggle="tooltip" ><i class="fa fa-times"></i></button>
                     </div><!-- /. tools -->
                 </div>
                 <div class="box-body">
                      <div class="row">

                          <div class="col-lg-10">
                              <table>

                                 @if(isset($applicant_meta_records))
                                      <tr>
                                            <th class="col-lg-8">Father's Name</th>
                                            <td>{{$applicant_meta_records->fathers_name}}</td>
                                      </tr>

                                      <tr>
                                          <th class="col-lg-8">Father's Occupation</th>
                                          <td>{{$applicant_meta_records->fathers_occupation}}</td>
                                      </tr>

                                      <tr>
                                          <th class="col-lg-8">Father's Phone</th>
                                          <td>{{$applicant_meta_records->fathers_phone}}</td>
                                      </tr>

                                      <tr>
                                          <th class="col-lg-8">Mother's Name</th>
                                          <td>{{$applicant_meta_records->mothers_name}}</td>
                                      </tr>

                                      <tr >
                                          <th class="col-lg-8">Mother's Occupation</th>
                                          <td>{{$applicant_meta_records->mothers_occupation}}</td>
                                      </tr>

                                      <tr>
                                          <th class="col-lg-8">Mother's Phone</th>
                                          <td>{{$applicant_meta_records->mothers_phone}}</td>
                                      </tr>

                                      <tr>
                                          <th class="col-lg-8">Marital Status</th>
                                          <td>{{$applicant_meta_records->marital_status}}</td>
                                      </tr>

                                      <tr>
                                          <th class="col-lg-8">Religion</th>
                                          <td>{{$applicant_meta_records->religion}}</td>
                                      </tr>

                                      <tr>
                                          <th class="col-lg-8">Present Address</th>
                                          <td>{{$applicant_meta_records->present_address}}</td>
                                      </tr>

                                      <tr>
                                          <th class="col-lg-8">Permanent Address</th>
                                          <td>{{$applicant_meta_records->permanent_address}}</td>
                                      </tr>

                                 @else
                                      {{"No Biographical Information found !"}}

                                 @endif

                                 @if($applicant_meta_records != null)
                                         <a style="margin-right:-21%" class="pull-right btn btn-default" href="{{ URL::to('applicant/profile/edit/' . $applicant_meta_records->id  ) }}" data-toggle="modal" data-target="#myeditModal" >Edit Profile</a>
                                 @else
                                         <a style="margin-right:-21%" class="pull-right btn btn-default" href="{{ URL::to('applicant/profile/create')}}" data-toggle="modal" data-target="#addModal" >Add Profile Data</a>
                                 @endif
                              </table>
                          </div>
                      </div>
                 </div>
                 <p>&nbsp;</p>
                 {{--<div class="box-footer clearfix">--}}
                    {{--<a class="pull-right btn btn-default"  href="{{url::to('admission/public/admission/add-applicant-acm-docs')}}" data-toggle="modal" data-target="#addDegreeModal"><b></b> Add Biographical Info </a>--}}
                 {{--</div>--}}
            </div>

         </section>

 </div>

 {{----------------------------------------------Modal --------------------------------------------------------------------------}}
 <div class="modal fade" id="addDegreeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
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

 <p>&nbsp;</p>
 <p>&nbsp;</p>

@stop
