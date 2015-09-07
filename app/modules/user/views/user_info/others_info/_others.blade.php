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
     <?php
        if($supporting_docs != null){
            $sdoc_id = $supporting_docs['id'];
        }else{
            $sdoc_id = 'null';
        }
     ?>
    <!-- left column -->
    <div style="background-color:#ffffff">
        <div class="box-header" style="background-color: #0490a6">
           <h3 class="text-center text-green"><b style="color: #f5f5f5">User Information</b></h3>
        </div>
            <section class="col-lg-12"style="background-color:#ffffff">
            <p>&nbsp;</p>
            <div class="col-lg-3"><b style="color: #000000">Supporting Documents</b>

            </div>
            <div class="col-lg-4" style="background-color:aliceblue">
                <table class="table table-striped  table-bordered">
                    <thead>
                        <tr>
                           <th>Goal Statement</th>
                           @if( $supporting_docs->academic_goal_statement != null)
                               <td>
                               <a class=" btn-link" href="{{ URL::route('user.supporting_docs.create', array('doc_type' => 'academic_goal_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal">
                                   {{ HTML::image('/uploads/user_images/docs/'.$supporting_docs->academic_goal_statement, $supporting_docs->academic_goal_statement,['class'=>'col-md-6'])}}
                                  <ins>Edit</ins>
                               </a><br>
                               <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'academic_goal_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                               </td>
                           @else
                               <td class="col-md-6"><a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'academic_goal_statement','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                           @endif
                        </tr>
                        <tr>
                            <th>Essay</th>
                            @if($supporting_docs->essay != null)
                                <td>
                                   <a class=" btn-link" href="{{ URL::route('user.supporting_docs.create', array('doc_type' => 'essay', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                        {{ HTML::image('/uploads/user_images/docs/'.$supporting_docs->essay, $supporting_docs->essay,['class'=>'col-md-6'])}}
                                        <ins>Edit</ins>
                                   </a><br>
                                   <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'essay', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                                </td>
                            @else
                                <td><a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'essay','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                            @endif
                        </tr>
                        <tr>
                            <th>Letter of Intent</th>
                            @if($supporting_docs->letter_of_intent != null)
                                <td>
                                    <a class=" btn-link" href="{{ URL::route('user.supporting_docs.create', array('doc_type' => 'letter_of_intent', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal">
                                        {{ HTML::image('/uploads/user_images/docs/'.$supporting_docs->letter_of_intent, $supporting_docs->letter_of_intent,['class'=>'col-md-6'])}}
                                        <ins>Edit</ins>
                                    </a><br>
                                    <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'letter_of_intent', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                                </td>
                            @else
                                <td><a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'letter_of_intent','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                            @endif
                        </tr>
                        <tr>
                            <th>Personal Statement</th>
                             @if($supporting_docs->personal_statement != null)
                                 <td>
                                     <a class=" btn-link" href="{{ URL::route('user.supporting_docs.create', array('doc_type' => 'personal_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                     {{ HTML::image('/uploads/user_images/docs/'.$supporting_docs->personal_statement, $supporting_docs->personal_statement,['class'=>'col-md-6'])}}
                                     <ins>Edit</ins>
                                     </a><br>
                                     <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'personal_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                                 </td>
                             @else
                                 <td><a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'personal_statement','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                             @endif
                        </tr>
                        <tr>
                            <th>Research Statement</th>
                             @if($supporting_docs->research_statement != null)
                                 <td>
                                     <a class=" btn-link" href="{{ URL::route('user.supporting_docs.create', array('doc_type' => 'research_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                     {{ HTML::image('/uploads/user_images/docs/'.$supporting_docs->research_statement, $supporting_docs->research_statement,['class'=>'col-md-6'])}}
                                     <ins>Edit</ins>
                                     </a><br>
                                     <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'research_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                                 </td>
                             @else
                                 <td><a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'research_statement','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                             @endif
                        </tr>
                    </thead>
                </table>
            </div>
            <div  class="col-lg-1"></div>

            <div class="col-lg-4" style="background-color:aliceblue">
                 <table class="table table-striped  table-bordered">
                     <thead>
                         <tr>
                             <th>Portfolio</th>
                             @if($supporting_docs->portfolio != null)
                                 <td>
                                     <a class=" btn-link" href="{{ URL::route('user.supporting_docs.create', array('doc_type' => 'portfolio', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                     {{ HTML::image('/uploads/user_images/docs/'.$supporting_docs->portfolio, $supporting_docs->portfolio,['class'=>'col-md-6'])}}
                                     <ins>Edit</ins>
                                     </a><br>
                                     <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'portfolio', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                                 </td>
                             @else
                                 <td><a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'portfolio','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal">add</a></td>
                             @endif
                         </tr>
                         <tr>
                              <th>Writing Sample</th>
                              @if($supporting_docs->writing_sample != null)
                                  <td>
                                      <a class=" btn-link" href="{{ URL::route('user.supporting_docs.create', array('doc_type' => 'writing_sample', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                      {{ HTML::image('/uploads/user_images/docs/'.$supporting_docs->writing_sample, $supporting_docs->writing_sample,['class'=>'col-md-6'])}}
                                      <ins>Edit</ins>
                                      </a><br>
                                      <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'writing_sample', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                                  </td>
                              @else
                                  <td><a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'writing_sample','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                              @endif
                         </tr>
                         <tr>
                             <th>Resume</th>
                                 @if($supporting_docs->resume != null)
                                     <td>
                                         <a class=" btn-link" href="{{ URL::route('user.supporting_docs.create', array('doc_type' => 'resume', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                             {{ HTML::image('/uploads/user_images/docs/'.$supporting_docs->resume, $supporting_docs->resume,['class'=>'col-md-6'])}}
                                             <ins>Edit</ins>
                                         </a><br>
                                         <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'resume', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                                     </td>
                                 @else
                                     <td><a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'resume','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                                 @endif
                         </tr>
                         <tr>
                             <th>Readmission personal details</th>
                             @if($supporting_docs->readmission_personal_details != null)
                                 <td>
                                     <a class=" btn-link" href="{{ URL::route('user.supporting_docs.create', array('doc_type' => 'readmission_personal_details', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                         {{ HTML::image('/uploads/user_images/docs/'.$supporting_docs->readmission_personal_details, $supporting_docs->readmission_personal_details,['class'=>'col-md-6'])}}
                                         <ins>Edit</ins>
                                     </a><br>
                                     <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'readmission_personal_details', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                                 </td>
                                 @else
                                    <td><a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'readmission_personal_details','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                                 @endif
                         </tr>
                         <tr>
                             <th>Other</th>
                             @if($supporting_docs->other != null)
                                 <td>
                                     <a class=" btn-link" href="{{URL::route('user.supporting_docs.create', array('doc_type' => 'other', 'sdoc_id'=>$sdoc_id))}}"  data-toggle="modal" data-target="#addgoalModal" ><ins>Edit</ins></a><br>
                                     <a href="{{ URL::route('user.supporting_docs.view', array('doc_type' => 'other', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal"><ins>View</ins></a>
                             @else
                                 <td>
                                     <a class=" btn-link" href="{{URL::route('user.supporting_docs.create',  ['doc_type' => 'other','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                                 </td>
                             @endif
                         </tr>
                     </thead>
                 </table>
            </div>
            </section>
            <p>&nbsp;</p>
            <hr>

            <section class="col-lg-12"style="background-color:#ffffff">
                <p>&nbsp;</p>
                <div class="col-lg-3"><b style="color: #000000">Extra Curricular Activities</b>

                </div>
                <div class="col-lg-9" style="background-color:aliceblue">
                    <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/extra-curricular-activities')}}" data-toggle="modal" data-target="#addModal" >+ Add</a>
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
            {{----------------------User : Miscellaneous Information ------------------------------------------------------------}}
            <section class="col-lg-12"style="background-color:#ffffff">
                <p>&nbsp;</p>
                    <div class="col-lg-3"><b style="color: #000000">Miscellaneous Information</b>
                    </div>
                    <div class="col-lg-9" style="background-color:aliceblue">
                       @if($misc_info != null)
                           <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/misc-info/edit',['id'=>$misc_info->id]) }}" data-toggle="modal" data-target="#addModal"> Edit </a>
                       @else
                           <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/misc-info')}}" data-toggle="modal" data-target="#addModal" >+ Add</a>
                       @endif
                       <table class="table table-striped  table-bordered">
                            <tr>
                                <th>Ever Admit this University?</th>
                                <td>@if($misc_info != null)
                                        {{ $misc_info->ever_admit_this_university ==1 ? 'Yes' : 'No' }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Ever Dismiss?</th>
                                <td>@if($misc_info != null)
                                        {{ $misc_info->ever_dismiss ==1 ? 'Yes' : 'No' }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Academic Honors Received?</th>
                                <td>@if($misc_info != null)
                                        {{ $misc_info->academic_honors_received ==1 ? 'Yes' : 'No' }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Ever Admit other University?</th>
                                <td>@if($misc_info != null)
                                        {{ $misc_info->ever_admit_other_university ==1 ? 'Yes' : 'No' }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Admission test Center</th>
                                <td>
                                    @if($misc_info != null)
                                        {{ $misc_info->admission_test_center  }}
                                    @else
                                    @endif
                                </td>
                            </tr>
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

