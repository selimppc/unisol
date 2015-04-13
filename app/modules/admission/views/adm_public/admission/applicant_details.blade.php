@extends('layouts.layout')
 @section('sidebar')
   @include('layouts._sidebar_applicant')
 @stop
@section('content')

<div class="row">
    <div class="col-md-12">
       <a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.public.degree_offer_list' )}}"> <i class="fa fa-arrow-circle-left"></i> Back To Admission Degree List</a>
    </div><!-- ./col -->
</div><!-- /.row -->
{{---------------------------------------------Data Table:admission on degree :Starts-----------------------------------------------------------------}}
 <div class="box box-solid ">

     <div class="box box-info">
          <div class="box-header">
          <h3 class="box-title">Admission On</h3>
          <div class="box-tools pull-right">
               <button class="btn btn-info btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
               <button class="btn btn-info btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>

          </div>
          <div class="box-body">
              <div class="row">
                  <div class="col-lg-12">
                     <div class="help-text-top">
                         <p>This panel allow to view degree list that you have been applied and can apply for more degree to <b>Add More Degree</b> button. This panel will redirect you to admission test details where you can choose exam center sequence for admission test.</p>
                     </div>
                     <table class="table table-striped table-bordered">
                          @if (isset($batch_applicant))
                            <tbody>
                                <tr>
                                    <th rowspan="100%" style="vertical-align: middle"><b style="font-size: medium">Degree Name</b></th>
                                </tr>
                                @foreach($batch_applicant as $value)
                                     <tr>
                                         <td class="col-lg-10">
                                               <a href="{{ URL::route('admission.applicant.admission.test_details',
                                                   ['id' => $value->id]) }}" class="btn-link" title="Degree,Subject & Exam Center Info For Admission">
                                                   {{ $value->relBatch->relDegree->title }} Of {{$value->relBatch->relDegree->relDegreeGroup->title}} On {{$value->relBatch->relDegree->relDepartment->title}}
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
              <a class="pull-right btn btn-xs btn-info" href="{{ URL::route('admission.applicant.add-degree' )}}" data-toggle="modal" data-target="#addDegreeModal"> Add more degree</a>
          </div>
     </div>
 </div>
{{-----------------------------------Data Table : admission on  degree Starts Ends---------------------------------------------------------------------------}}

{{-----------------------------------Applicant's Profile:Personal Information starts--------------------------------------------------------}}

 <div class="box  box-info">
    <div class="box-header">
        <h5 class="box-title" style="color: orangered; font-size: 14px;">Before proceeding to checkout please complete your Profile and Academic Record :: To checkout click on the button >> "Next"</h5>
        <div class="box-tools pull-right">
            <a class="pull-right btn btn-xs btn-success"  href="{{ URL::route('admission.applicant.adm_checkout')}}"><b style="color: #ffffff;"> Next </b> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <section class="col-lg-6 connectedSortable">
        <p>&nbsp;</p>
        <div class="box box-info">
             <div class="box-header">
                <h3 class="box-title">Personal Information</h3>

                <div class="pull-right box-tools">
                     <button class="btn btn-info btn-xs" data-widget="remove" data-toggle="tooltip" ><i class="fa fa-times"></i></button>
                </div><!-- /. tools -->

             </div>
             <div class="box-body">
                  <div class="row">
                      <div class="col-lg-4">
                              @if(isset($applicant_personal_info))
                                  <td class="etsb-image-doc">{{ $applicant_personal_info->profile_image != null ? HTML::image('/applicant_images/profile/'.$applicant_personal_info->profile_image) :  HTML::image('/img/profile.jpg') }}</td>
                              @endif
                      </div>
                      <div class="col-lg-8">
                         <table>
                            @if($applicant_personal_info != null)
                                <a style="margin-left:-21%" class="pull-right btn btn-default" href="{{ URL::route('admission.public.applicant-profile-edit', ['id'=>$applicant_personal_info->id]  ) }}" data-toggle="modal" data-target="#addDegreeModal" >Edit</a>
                            @else
                                <a style="margin-left:-21%" class="pull-right btn btn-default" href="{{ URL::route('admission.public.add-applicant-profile')}}" data-toggle="modal" data-target="#addDegreeModal" >Add Profile Information</a>
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
                  <p>
                     <em><span class="text-danger">*</span><strong style="color:darkmagenta"> Please add at least two academic records.</strong></em>
                  </p>
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
                           <tbody>
                               @if(isset($applicant_acm_records))
                                   @foreach($applicant_acm_records as $value)
                                       <tr>
                                            <td>{{strtoupper($value->level_of_education )}}</td>
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
     {{-----------------------Applicant's Biographical Information ----------------------------------------------------------------}}
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
                      <div class="col-lg-12">
                          <table class="table table-bordered">
                          @if($applicant_meta_records != null)
                               <a class="pull-right btn btn-default" href="{{ URL::route('admission.public.edit-applicant-meta' , ['applicant_id'=>$applicant_meta_records->id]  ) }}" data-toggle="modal" data-target="#addDegreeModal" >Edit</a>
                          @else
                               <a class="pull-right btn btn-default" href="{{ URL::route('admission.public.add-applicant-meta')}}" data-toggle="modal" data-target="#addDegreeModal" >Add Biographical Information</a>
                          @endif

                          @if(isset($applicant_meta_records))
                                  <tr>
                                      <th class="col-lg-6">Father's Name</th>
                                      <td>{{$applicant_meta_records->fathers_name}}</td>
                                  </tr>

                                  <tr>
                                      <th class="col-lg-6">Father's Occupation</th>
                                      <td>{{$applicant_meta_records->fathers_occupation}}</td>
                                  </tr>

                                  <tr>
                                      <th class="col-lg-6">Is Freedom Fighter?</th>
                                      <td>{{$applicant_meta_records['freedom_fighter']==1 ? 'Yes' : 'No'}}</td>
                                  </tr>

                                  <tr>
                                      <th class="col-lg-6">Father's Phone</th>
                                      <td>{{$applicant_meta_records->fathers_phone}}</td>
                                  </tr>

                                  <tr>
                                      <th class="col-lg-6">Mother's Name</th>
                                      <td>{{$applicant_meta_records->mothers_name}}</td>
                                  </tr>

                                  <tr >
                                      <th class="col-lg-6">Mother's Occupation</th>
                                      <td>{{$applicant_meta_records->mothers_occupation}}</td>
                                  </tr>

                                  <tr>
                                      <th class="col-lg-6">Mother's Phone</th>
                                      <td>{{$applicant_meta_records->mothers_phone}}</td>
                                  </tr>

                                  <tr>
                                      <th class="col-lg-6">Marital Status</th>
                                      <td>
                                         {{strtoupper($applicant_meta_records->marital_status)}}
                                      </td>
                                  </tr>

                                  <tr>
                                      <th class="col-lg-6">Religion</th>
                                      <td>{{$applicant_meta_records->religion}}</td>
                                  </tr>

                                  <tr>
                                      <th class="col-lg-6">Present Address</th>
                                      <td>{{$applicant_meta_records->present_address}}</td>
                                  </tr>

                                  <tr>
                                      <th class="col-lg-6">Permanent Address</th>
                                      <td>{{$applicant_meta_records->permanent_address}}</td>
                                  </tr>
                                  <tr>
                                      <th class="col-lg-6">Signature</th>
                                      <td class="etsb-image-doc">{{ $applicant_meta_records->signature != null ? HTML::image('/applicant_images/app_meta/'.$applicant_meta_records->signature) :'Signature do not added yet.' }}</td>
                                  </tr>
                          @else
                              {{"No Biographical Information found !"}}
                          @endif
                          </table>
                      </div>
                  </div>
              </div>
              <p>&nbsp;</p>
          </div>
   </section>
 </div>

 {{----------------------------------------------Modal --------------------------------------------------------------------------}}
 <div class="modal fade" id="addDegreeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog" style="z-index:1050">
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

