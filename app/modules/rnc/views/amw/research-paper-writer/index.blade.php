@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <h2 class="page-header text-purple tab-text-margin text-center">Research and Consultancy Management</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">RnC Writer</a></li>
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

                             <a class="pull-right btn btn-sm btn-info" style="margin-right: 5px"
                                data-toggle="modal" data-target="#addWriter"
                                title="Add Writer">
                                <b>+ Add Writer</b>
                             </a>
                            {{Form::open(array('route'=> ['amw.research-paper-writer.batch-delete'], 'class'=>'form-horizontal','files'=>true))}}
                            <table id="example" class="table table-bordered table-hover table-striped scrollit">
                                <thead>
                                <tr>
                                    <th>
                                        <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                                    </th>
                                    <th>Title</th>
                                    <th>Research Paper</th>
                                    <th>Writter Name</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($rnc_r_p_writer as $value)
                                    <tr>
                                        <td><input type="checkbox" name="id[]"  class="myCheckbox" value="{{ $value->id }}">
                                        </td>
                                        <td>{{isset($value->title) ? $value->title :'' }}</td>
                                        <td>{{isset($value->rnc_research_paper_id) ? $value->rnc_research_paper_id :'' }}</td>
                                        <td>{{isset($value->writer_user_id) ? $value->writer_user_id :'' }}</td>
                                        <td>{{isset($value->note) ? $value->note :'' }}</td>


                                        <td>
                                            {{--<a href="{{ URL::route('amw.research-paper.writer', ['rnc_r_p_id'=>$value->id]) }}" class="btn btn-xs btn-default" ><i class="fa fa-sort-alpha-asc" style="color: #5107cc"></i></a>--}}
                                            {{--<a data-href="{{ URL::route('amw.research-paper.delete', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="color:red"></i></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ Form::submit('Delete', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                            {{ Form::close() }}
                            {{--{{ $rnc_r_p_writer->links() }}--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



     {{--Modal add new--}}
    <div id="addWriter" class="modal fade">
        <div class="modal-dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Add Research Paper Writer</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'rnc/amw/research-paper-writer/save', 'method' =>'post', 'role'=>'form')) }}
                        @include('rnc::amw.research-paper-writer._form')
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

