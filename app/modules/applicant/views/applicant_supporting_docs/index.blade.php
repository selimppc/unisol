@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')

<div class="span9 well">

<?php
    if($supporting_docs != null){
        $sdoc_id = $supporting_docs['id'];
    }else{
        $sdoc_id = 'null';
    }
    //exit;
?>

<table class="table table-striped table-bordered" id="myTable">
     <h4>Supporting  Documents</h4>

    <thead>

         <tr>
            <th>Goal Statement</th>
                 @if( $supporting_docs->academic_goal_statement != null)
                     <td>  {{ HTML::image('applicant_images/' .$supporting_docs->academic_goal_statement) }}
                     <a class=" btn btn-xs btn-info" href="{{ URL::route('applicant.supporting_docs.view', array('doc_type' => 'academic_goal_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >Edit</a> </td>
                @else

                    <td><a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', ['doc_type' => 'academic_goal_statement', 'sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                 @endif
          </tr>

           <tr>
              <th>Essay</th>

              @if($supporting_docs->essay != null)
                <td>  {{ HTML::image('applicant_images/' .$supporting_docs->essay) }}
                <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', array('doc_type' => 'essay', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >Edit</a>
               @else
                 <td>
                 <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', ['doc_type' => 'essay', 'sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a>
                </td>
                 @endif
           </tr>

            <tr>
             <th>Letter of Intent</th>

             @if($supporting_docs->letter_of_intent != null)
               <td>  {{ HTML::image('applicant_images/' .$supporting_docs->letter_of_intent) }}
               <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', array('doc_type' => 'letter_of_intent', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >Edit</a>
              @else
                <td>
                <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', ['doc_type' => 'letter_of_intent', 'sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a>
               </td>
                @endif
          </tr>

          <tr>
           <th>Personal Statement</th>

           @if($supporting_docs->personal_statement != null)
             <td>  {{ HTML::image('applicant_images/' .$supporting_docs->personal_statement) }}
             <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', array('doc_type' => 'personal_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >Edit</a>
            @else
              <td>
              <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', ['doc_type' => 'personal_statement', 'sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a>
             </td>
              @endif
            </tr>

            <tr>
               <th>Research Statement</th>

               @if($supporting_docs->research_statement != null)
                 <td>  {{ HTML::image('applicant_images/' .$supporting_docs->research_statement) }}
                 <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', array('doc_type' => 'research_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >Edit</a>
                @else
                  <td>
                  <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', ['doc_type' => 'research_statement', 'sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a>
                 </td>
                  @endif
            </tr>

            <tr>
               <th>Portfolio</th>

               @if($supporting_docs->portfolio != null)
                 <td>  {{ HTML::image('applicant_images/' .$supporting_docs->portfolio) }}
                 <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', array('doc_type' => 'portfolio', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >Edit</a>
                @else
                  <td>
                  <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', ['doc_type' => 'portfolio', 'sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a>
                 </td>
                  @endif
            </tr>

            <tr>
               <th>Resume</th>

               @if($supporting_docs->resume != null)
                 <td>  {{ HTML::image('applicant_images/' .$supporting_docs->resume) }}
                 <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', array('doc_type' => 'resume', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >Edit</a>
                @else
                  <td>
                  <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', ['doc_type' => 'resume', 'sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a>
                 </td>
                  @endif
            </tr>

            <tr>
               <th>Readmission_personal_details</th>

               @if($supporting_docs->readmission_personal_details != null)
                 <td>  {{ HTML::image('applicant_images/' .$supporting_docs->readmission_personal_details) }}
                 <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', array('doc_type' => 'readmission_personal_details', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >Edit</a>
                @else
                  <td>
                  <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', ['doc_type' => 'readmission_personal_details', 'sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a>
                 </td>
                  @endif
            </tr>

            <tr>
               <th>Other</th>

               @if($supporting_docs->other != null)
                 <td>  {{ HTML::image('applicant_images/' .$supporting_docs->other) }}
                 <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', array('doc_type' => 'other', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >Edit</a>
                @else
                  <td>
                  <a class=" btn btn-xs btn-info" href="{{URL::route('applicant.supporting_docs.view', ['doc_type' => 'other', 'sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a>
                 </td>
                  @endif
            </tr>

          </thead>

        <tbody>
     <br><br>
     </tbody>
    </table>

</div>


    {{-----------------------------------------Modals------------------------------------------------------------}}

    <!-- Modal : add goal -->
    <div class="modal fade" id="addgoalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        </div>
      </div>
    </div>

@stop