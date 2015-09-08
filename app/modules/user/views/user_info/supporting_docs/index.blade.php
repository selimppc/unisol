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
    <div class="background-color">
        <section class="col-lg-12 background-color">
            <div class="col-lg-3" ><b class="color-text-black">Supporting Documents</b>

            </div>
            <div class="col-lg-4 div-background-color">
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

            <div class="col-lg-4 div-background-color">
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

