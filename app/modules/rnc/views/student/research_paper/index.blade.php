@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_student')
@stop
@section('content')
    <h2 class="page-header text-purple tab-text-margin text-center">Research and Consultancy Management</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Research Paper</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Settings  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> </a>
                            </li>
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
                            {{--<button type="button" class=" btn btn-xs btn-success fa fa-plus " data-toggle="modal" data-target="#add_r_n_c" >--}}
                                {{--Add New RnC--}}
                            {{--</button>--}}

                             <a class="pull-right btn btn-sm btn-info" style="margin-right: 5px"
                                data-toggle="modal" data-target="#add"
                                title="Add Research Paper">
                                <b>+ Add Research Paper</b>
                             </a>
                            {{Form::open(array('route'=> ['student.research-paper.batch-delete'], 'class'=>'form-horizontal','files'=>true))}}
                            <table id="example" class="table table-bordered table-hover table-striped scrollit">
                                <thead>
                                <tr>
                                    <th>
                                        <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                                    </th>
                                    <th>Title</th>
                                    <th>Abstract</th>
                                    <th>Category</th>
                                    <th>Publisher</th>
                                    <th>Publication No</th>
                                    <th>Searching</th>
                                    <th>Benefit Share(%)</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Reviewed By</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($research_paper as $value)
                                    <tr>
                                        <td><input type="checkbox" name="id[]"  class="myCheckbox" value="{{ $value->id }}">
                                        </td>
                                        <td>{{isset($value->title) ? $value->title :'' }}</td>
                                         <td>{{isset($value->abstract) ? $value->abstract : '' }}</td>
                                        <td>{{isset($value->relRnCCategory->title) ? $value->relRnCCategory->title : '' }}</td>
                                        <td>{{isset($value->relRnCPublisher->title) ? $value->relRnCPublisher->title : ''}}</td>
                                        <td>{{isset($value->publication_no) ? $value->publication_no : ''}}</td>
                                        <td>{{isset($value->searching) ? $value->searching : ''}}</td>
                                        <td>{{isset($value->benefit_share) ? $value->benefit_share : ''}} %</td>
                                        <td>{{isset($value->price) ? $value->price : ''}}</td>
                                        <td>{{isset($value->status) ? $value->status : ''}}</td>
                                        <td>{{isset($value->reviewed_by) ? $value->reviewed_by : ''}}</td>
                                        @if($value->file==null)
                                            <td style="color:magenta"><b>No File</b></td>
                                        @else
                                            <td>
                                                <a href="{{ URL::route('student.research-paper.read',['book_id'=>$value->id]) }}" target="_blank"><i class="fa fa-tablet" title="Read Book"></i></a>
                                                <a href="{{ URL::route('student.research-paper.download',['book_id'=>$value->id]) }}" style="color: blue" ><i class="fa fa-cloud-download" title="Download"></i></a>
                                            </td>
                                        @endif
                                        <td>
                                            <a href="{{ URL::route('student.research-paper.view', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" href=""><i class="fa fa-eye" style="color: green" title="View"></i></a>
                                            <a href="{{ URL::route('student.research-paper.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc" title="Edit"></i></a>
                                            <a href="{{ URL::route('student.research-paper-writer.index', ['rnc_r_p_id'=>$value->id]) }}" class="btn btn-xs btn-success" >Writter</a>
                                            <a href="{{ URL::route('student.research-paper.comment', ['rnc_r_p_id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#commentModal" href="" ><i class="fa fa-comment" style="color: mediumpurple" title="Comemnt"></i></a>
                                            <a data-href="{{ URL::route('student.research-paper.delete', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="color:red" title="Delete"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ Form::submit('Delete', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                            {{ Form::close() }}
                            {{ $research_paper->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



     {{--Modal add new--}}
    <div id="add" class="modal fade">
        <div class="modal-dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Add Research Paper </h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'rnc/student/research-paper/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                        @include('rnc::student.research_paper._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

     {{--Modal for Edit--}}

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

    {{--Modal for Comment--}}

            <div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div>


     {{--Modal for show--}}

    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>

     {{--Modal for delete--}}

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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

@stop

