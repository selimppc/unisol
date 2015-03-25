@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<div>
   <a class="pull-right btn btn-sm btn-success" href="{{ action('UserSignupController@batchApplicantIndex', $batch_id)}}"> <i class="fa fa-arrow-circle-left"></i> Go Back</a>
</div>

 <section class="col-lg-6 connectedSortable">
       <h3 class="box-title">Applicant's Profile </h3>
            <p>&nbsp;</p>
            <div class="box box-info">
                 <div class="box-header">
                     <h3 class="box-title">Account Information</h3>
                     <!-- tools box -->
                     <div class="pull-right box-tools">
                         <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" ><i class="fa fa-times"></i></button>
                     </div><!-- /. tools -->
                 </div>
                     <div class="box-body">
                          <div class="row">
                              <div class="col-lg-8">
                                  <table>
                                          @if(isset($applicant_account_info))
                                                 <tr>
                                                     <th class="col-lg-6">Name</th>
                                                     <td>{{$applicant_account_info->first_name.''.$applicant_account_info->last_name}}</td>
                                                 </tr>

                                                 <tr>
                                                     <th class="col-lg-6">Username</th>
                                                     <td>{{$applicant_account_info->username}}</td>
                                                 </tr>

                                                 <tr>
                                                     <th class="col-lg-6">Email Address</th>
                                                     <td>{{$applicant_account_info->email}}</td>
                                                 </tr>

                                          @else
                                              {{"No Account data found !"}}
                                          @endif
                                  </table>
                              </div>
                          </div>
                     </div>
                     <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><br>
                     <div class="box-footer clearfix">
                         {{--<button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>--}}
                     </div>
            </div>


        {{--------------------------------------------- Academic Information ------------------------------------------------------------------------------}}
            <div class="box box-info">
                 <div class="box-header">
                     <h3 class="box-title">Academic Information</h3>
                     <!-- tools box -->
                     <div class="pull-right box-tools">
                         <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" ><i class="fa fa-times"></i></button>
                     </div><!-- /. tools -->
                 </div>
                     <div class="box-body">
                          <div class="row">

                              <div class="col-lg-12">
                                 <table class="table  table-bordered">
                                       <thead>
                                              <tr>
                                                 <th>Level Of Education</th>
                                                 <th>Board / University</th>
                                                 <th>Passing Year</th>
                                                 <th>Result</th>
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
                         {{--<button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>--}}
                     </div>
            </div>

               <p>&nbsp;</p>
               <p>&nbsp;</p>
 </section>


 <section class="col-lg-6 connectedSortable">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div class="box box-info">

         <div class="box-header">
             <h3 class="box-title">Profile Information</h3>
             <!-- tools box -->
             <div class="pull-right box-tools">
                 <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" ><i class="fa fa-times"></i></button>
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
                          @if(isset($applicant_profile_info))
                               <tr>
                                   <th class="col-lg-6">Phone</th>
                                   <td>{{$applicant_profile_info->phone}}</td>
                               </tr>

                               <tr>
                                   <th class="col-lg-6">Date of Birth</th>
                                   <td>{{$applicant_profile_info->date_of_birth}}</td>
                               </tr>

                               <tr>
                                   <th class="col-lg-6">Place of Birth</th>
                                   <td>{{$applicant_profile_info->place_of_birth}}</td>
                               </tr>

                               <tr>
                                   <th class="col-lg-6">Gender</th>
                                   <td>{{$applicant_profile_info->gender}}</td>
                               </tr>

                               <tr>
                                    <th class="col-lg-6">City</th>
                                    <td>{{$applicant_profile_info->city}}</td>
                               </tr>

                               <tr>
                                    <th class="col-lg-6">State</th>
                                    <td>{{$applicant_profile_info->state}}</td>
                               </tr>

                               <tr>
                                    <th class="col-lg-6">Country</th>
                                    <td>{{$applicant_profile_info->relCountry->title}}</td>
                               </tr>
                          @else
                            {{"No Profile data found !"}}
                          @endif

                      </table>
                  </div>
              </div>

         </div>

         <div class="box-footer clearfix">
             {{--<button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>--}}
         </div>
    </div>
    <p>&nbsp;</p>
        <div class="box box-info">
             <div class="box-header">
                 <h3 class="box-title">Biographical Information</h3>
                 <!-- tools box -->
                 <div class="pull-right box-tools">
                     <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" ><i class="fa fa-times"></i></button>
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
                             </table>
                          </div>
                      </div>
                 </div>

                 <div class="box-footer clearfix">
                     {{--<button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>--}}
                 </div>
        </div>
{{----------------------------------------------Others ------------------------------------------------------------------------}}
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-solid">
                <div class="box-header">
                     <h3 class="box-title">Rest Of The Applicant's Information</h3>
                     <!-- tools box -->
                     <div class="pull-right box-tools">
                         <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" ><i class="fa fa-times"></i></button>
                     </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                            <div class="box-header">
                                <h5 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        Extra Curricular Activities
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <div class="row">

                                          <div class="col-lg-12">
                                          @if(isset($applicant_extra_curr_activities))
                                             <table class="table  table-bordered">

                                                   <thead>
                                                          <tr>
                                                             <th>Title</th>
                                                             <th>Description</th>
                                                             <th>Achievement</th>
                                                          </tr>
                                                   </thead>
                                                        <tbody>

                                                                @foreach($applicant_extra_curr_activities as $value)
                                                                   <tr>
                                                                        <td>{{($value->title )}}</td>
                                                                        <td>{{ $value->description}}</td>
                                                                        <td>{{ $value->Achievement}}</td>
                                                                   </tr>
                                                                @endforeach

                                                        </tbody>
                                             </table>
                                          @else
                                               {{"No Data found !"}}
                                          @endif
                                          </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-danger">
                            <div class="box-header">
                                <h5 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        Supporting Documents
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                 <div class="box-body">
                                       <div class="row">

                                             <div class="col-lg-12">
                                                 <table class="table table-bordered">
                                                       <thread>
                                                               <tr>
                                                                   <th class="col-lg-8">Goal Statement</th>
                                                                   <td>
                                                                       @if( isset($supporting_docs->academic_goal_statement))
                                                                             {{ HTML::image('applicant_images/' .$supporting_docs->academic_goal_statement) }}
                                                                       @endif
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <th>Essay</th>
                                                                   <td>
                                                                       @if( isset($supporting_docs->essay))
                                                                            {{ HTML::image('applicant_images/' .$supporting_docs->essay) }}
                                                                       @endif
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <th>Letter of Intent</th>
                                                                    <td>
                                                                       @if( isset($supporting_docs->letter_of_intent))
                                                                          {{ HTML::image('applicant_images/' .$supporting_docs->letter_of_intent) }}
                                                                       @endif
                                                                    </td>
                                                               </tr>
                                                               <tr>
                                                                   <th>Personal Statement</th>
                                                                   <td>
                                                                       @if( isset($supporting_docs->personal_statement))
                                                                           {{ HTML::image('applicant_images/' .$supporting_docs->personal_statement) }}

                                                                       @endif
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <th>Research Statement</th>
                                                                   <td>
                                                                        @if( isset($supporting_docs->research_statement))
                                                                            {{ HTML::image('applicant_images/' .$supporting_docs->research_statement) }}

                                                                        @endif
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <th>Portfolio</th>
                                                                   <td>
                                                                       @if( isset($supporting_docs->portfolio))
                                                                          {{ HTML::image('applicant_images/' .$supporting_docs->portfolio) }}

                                                                       @endif
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <th>Resume</th>
                                                                   <td>
                                                                       @if( isset($supporting_docs->resume))
                                                                          {{ HTML::image('applicant_images/' .$supporting_docs->resume) }}

                                                                       @endif
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <th>Readmission personal details</th>
                                                                   <td>
                                                                       @if( isset($supporting_docs->readmission_personal_details))
                                                                           {{ HTML::image('applicant_images/' .$supporting_docs->readmission_personal_details) }}

                                                                       @endif
                                                                   </td>
                                                               </tr>
                                                               <tr>
                                                                   <th>Others</th>
                                                                   <td>
                                                                        @if( isset($supporting_docs->other))
                                                                           {{$supporting_docs->other }}

                                                                        @endif
                                                                   </td>
                                                               </tr>
                                                       </thread>

                                                 </table>
                                             </div>
                                         </div>

                                 </div>
                            </div>
                        </div>
                        <div class="panel box box-success">
                            <div class="box-header">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                        Miscellaneous Information
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="box-body">
                                    <table class="table table-bordered">
                                           <thread>
                                              <tr>
                                                  <th class="col-lg-8">Ever Admit this University</th>
                                                  <td>
                                                      @if( isset($miscellaneous_info->ever_admit_this_university))
                                                            {{$miscellaneous_info->ever_admit_this_university ==1 ? 'Yes' : 'No'}}
                                                      @endif
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <th>Ever Dismiss</th>
                                                  <td>
                                                      @if( isset($miscellaneous_info->ever_dismiss))
                                                           {{$miscellaneous_info->ever_dismiss ==1 ? 'Yes' : 'No'}}
                                                      @endif
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <th>Academic Honors Received</th>
                                                   <td>
                                                      @if( isset($miscellaneous_info->academic_honors_received))
                                                         {{ $miscellaneous_info->academic_honors_received ==1 ? 'Yes' : 'No'}}
                                                      @endif
                                                   </td>
                                              </tr>
                                              <tr>
                                                  <th>Ever Admit other University</th>
                                                  <td>
                                                      @if( isset($miscellaneous_info->ever_admit_other_university))
                                                          {{ $miscellaneous_info->ever_admit_other_university ==1 ? 'Yes' : 'No'}}

                                                      @endif
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <th>Admission test Center</th>
                                                  <td>
                                                       @if( isset($miscellaneous_info->admission_test_center))
                                                           {{$miscellaneous_info->admission_test_center ==1 ? 'Yes' : 'No' }}

                                                       @endif
                                                  </td>
                                              </tr>

                                      </thread>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    <!-- END ACCORDION & CAROUSEL-->
{{-----------------------------------------------------------------------------------------------------------------------------}}

 </section>
 {{----------------------------------------  Other Informations ------------------------------------------------------------------------------------------}}

                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="box box-solid">--}}
                                {{--<div class="box-header">--}}
                                    {{--<h3 class="box-title">Rest Of The Applicant's Information</h3>--}}
                                {{--</div><!-- /.box-header -->--}}
                                {{--<div class="box-body">--}}
                                    {{--<div class="box-group" id="accordion">--}}
                                        {{--<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->--}}
                                        {{--<div class="panel box box-primary">--}}
                                            {{--<div class="box-header">--}}
                                                {{--<h4 class="box-title">--}}
                                                    {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">--}}
                                                        {{--Collapsible Group Item #1--}}
                                                    {{--</a>--}}
                                                {{--</h4>--}}
                                            {{--</div>--}}
                                            {{--<div id="collapseOne" class="panel-collapse collapse in">--}}
                                                {{--<div class="box-body">--}}
                                                    {{--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="panel box box-danger">--}}
                                            {{--<div class="box-header">--}}
                                                {{--<h4 class="box-title">--}}
                                                    {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">--}}
                                                        {{--Collapsible Group Danger--}}
                                                    {{--</a>--}}
                                                {{--</h4>--}}
                                            {{--</div>--}}
                                            {{--<div id="collapseTwo" class="panel-collapse collapse">--}}
                                                {{--<div class="box-body">--}}
                                                    {{--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="panel box box-success">--}}
                                            {{--<div class="box-header">--}}
                                                {{--<h4 class="box-title">--}}
                                                    {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">--}}
                                                        {{--Collapsible Group Success--}}
                                                    {{--</a>--}}
                                                {{--</h4>--}}
                                            {{--</div>--}}
                                            {{--<div id="collapseThree" class="panel-collapse collapse">--}}
                                                {{--<div class="box-body">--}}
                                                    {{--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div><!-- /.box-body -->--}}
                            {{--</div><!-- /.box -->--}}
                        {{--</div><!-- /.col -->--}}
                    {{--</div><!-- /.row -->--}}
                    {{--<!-- END ACCORDION & CAROUSEL-->--}}




 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>

@stop
