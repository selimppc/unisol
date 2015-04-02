@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <div class="span9 well">

        <?php
        if($supporting_docs != null){
            $sdoc_id = $supporting_docs['id'];
        }else{
            $sdoc_id = 'null';
        }

        ?>

        <!-- START CUSTOM TABS -->
  <h2 class="page-header text-purple tab-text-margin">Supporting  Documents</h2>
        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Supporting  Documents</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Settings  <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> </a></li>
                            </ul>
                        </li>
                        <li class="pull-right" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                            <ul class="dropdown-menu">
                                <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
        <div class="box-body table-responsive ">
            <table class="table table-striped  table-bordered">
                <thead>
                <tr>
                    <th>Goal Statement</th>
                    @if( $supporting_docs->academic_goal_statement != null)
                        <td><a class=" btn-link" href="{{ URL::route('applicant.supporting_docs.view', array('doc_type' => 'academic_goal_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                {{ HTML::image('/applicant_images/supporting_doc/'.$supporting_docs->academic_goal_statement, $supporting_docs->academic_goal_statement,['class'=>'col-md-3'])}}
                                Edit</a><br></td>
                    @else
                        <td><a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view',  ['doc_type' => 'academic_goal_statement','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                    @endif
                </tr>
                <tr>
                    <th>Essay</th>
                    @if($supporting_docs->essay != null)
                        <td><a class=" btn-link" href="{{ URL::route('applicant.supporting_docs.view', array('doc_type' => 'essay', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                {{ HTML::image('/applicant_images/supporting_doc/'.$supporting_docs->essay, $supporting_docs->essay,['class'=>'col-md-3'])}}
                                Edit</a><br></td>
                    @else
                        <td><a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view',  ['doc_type' => 'essay','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                    @endif
                </tr>
                <tr>
                    <th>Letter of Intent</th>
                    @if($supporting_docs->letter_of_intent != null)
                        <td><a class=" btn-link" href="{{ URL::route('applicant.supporting_docs.view', array('doc_type' => 'letter_of_intent', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                {{ HTML::image('/applicant_images/supporting_doc/'.$supporting_docs->letter_of_intent, $supporting_docs->letter_of_intent,['class'=>'col-md-3'])}}
                                Edit</a><br></td>
                    @else
                        <td><a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view',  ['doc_type' => 'letter_of_intent','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                    @endif
                </tr>
                <tr>
                    <th>Personal Statement</th>

                    @if($supporting_docs->personal_statement != null)

                        <td><a class=" btn-link" href="{{ URL::route('applicant.supporting_docs.view', array('doc_type' => 'personal_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                {{ HTML::image('/applicant_images/supporting_doc/'.$supporting_docs->personal_statement, $supporting_docs->personal_statement,['class'=>'col-md-3'])}}
                                Edit</a><br></td>
                    @else
                        <td><a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view',  ['doc_type' => 'personal_statement','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                    @endif
                </tr>
                <tr>
                    <th>Research Statement</th>

                    @if($supporting_docs->research_statement != null)
                        <td><a class=" btn-link" href="{{ URL::route('applicant.supporting_docs.view', array('doc_type' => 'research_statement', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                {{ HTML::image('/applicant_images/supporting_doc/'.$supporting_docs->research_statement, $supporting_docs->research_statement,['class'=>'col-md-3'])}}
                                Edit</a><br></td>
                    @else
                        <td><a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view',  ['doc_type' => 'research_statement','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                    @endif
                </tr>
                <tr>
                    <th>Portfolio</th>
                    @if($supporting_docs->portfolio != null)
                        <td><a class=" btn-link" href="{{ URL::route('applicant.supporting_docs.view', array('doc_type' => 'portfolio', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                {{ HTML::image('/applicant_images/supporting_doc/'.$supporting_docs->portfolio, $supporting_docs->portfolio,['class'=>'col-md-3'])}}
                                Edit</a><br></td>
                    @else
                        <td><a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view',  ['doc_type' => 'portfolio','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                    @endif
                </tr>
                <tr>
                    <th>Resume</th>
                        @if($supporting_docs->resume != null)
                            <td><a class=" btn-link" href="{{ URL::route('applicant.supporting_docs.view', array('doc_type' => 'portfolio', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                    {{ HTML::image('/applicant_images/supporting_doc/'.$supporting_docs->resume, $supporting_docs->resume,['class'=>'col-md-3'])}}
                                    Edit</a><br></td>
                        @else
                            <td><a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view',  ['doc_type' => 'resume','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                        @endif
                </tr>
                <tr>
                    <th>Readmission personal details</th>
                    @if($supporting_docs->readmission_personal_details != null)
                        <td><a class=" btn-link" href="{{ URL::route('applicant.supporting_docs.view', array('doc_type' => 'readmission_personal_details', 'sdoc_id'=>$sdoc_id))}}" data-toggle="modal" data-target="#addgoalModal" >
                                {{ HTML::image('/applicant_images/supporting_doc/'.$supporting_docs->readmission_personal_details, $supporting_docs->readmission_personal_details,['class'=>'col-md-3'])}}
                                Edit</a><br></td>
                    @else
                        <td><a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view',  ['doc_type' => 'readmission_personal_details','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                    @endif
                </tr>
                <tr>
                    <th>Other</th>
                    @if($supporting_docs->other != null)
                        <td>  {{ $supporting_docs->other }}
                            <a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view', array('doc_type' => 'other', 'sdoc_id'=>$sdoc_id))}}"  data-toggle="modal" data-target="#addgoalModal" >Edit</a>
                    @else
                        <td>
                        <td><a class=" btn-link" href="{{URL::route('applicant.supporting_docs.view',  ['doc_type' => 'other','sdoc_id'=>$sdoc_id])}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                        </td>
                    @endif
                </tr>
                    </thead>
                    <tbody>
                    <br><br>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
    {{-----------------------------------------Modals------------------------------------------------------------}}

    <!-- Modal : add goal -->
    <div class="modal fade" id="addgoalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>


    <div class="modal fade" id="sdocs_otherModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

@stop