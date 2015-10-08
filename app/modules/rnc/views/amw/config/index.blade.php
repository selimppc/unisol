 @extends('layouts.layout')
 @section('top_menu')
     @include('layouts._top_menu')
 @stop
 @section('sidebar')
     @include('layouts._sidebar_amw')
 @stop
 @section('content')


    <h2 class="page-header text-blue tab-text-margin">Research and Consultancy : Config</h2>
        <div class="row">
               <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Config List</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Settings  <span class="caret"></span>
                            </a>
                        </li>

                        <li class="pull-right" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                            <ul class="dropdown-menu">
                                <li role="presentation" data-toggle="modal" data-target="#addConfig"><a role="menuitem" tabindex="-1" href="#"> Add Config </a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class="pull-right btn btn-sm btn-info" style="margin-right: 5px"
                        href="{{ URL::route('amw.config.add') }}"
                        data-toggle="modal" data-target="#add"
                        title="Add Config">
                        <b>+ Add Config</b>
                    </a>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="box-body table-responsive ">
                            {{ Form::open(array('url' => 'rnc/amw/config/batch-delete')) }}
                                <table id="example" class="table table-bordered table-hover table-striped">
                                    <thead>
                                    {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}
                                        <tr>
                                            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                            <th>Title</th>
                                            <th>Value</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($config))
                                        @foreach ($config as $data)
                                            <tr>
                                                <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $data->id }}"></td>
                                                <td>{{ $data->title }}</td>
                                                 <td>{{ $data->value }}</td>
                                                <td>
                                                    <a href="{{ URL::route('amw.config.show', ['id'=>$data->id])  }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#show" href=""><i class="fa fa-eye" style="color: green"></i></a>
                                                    <a href="{{ URL::route('amw.config.edit', ['id'=>$data->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#edit" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>
                                                    <a data-href="{{ URL::route('amw.config.delete', ['id'=>$data->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-trash-o" style="color: red"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            {{ Form::close() }}
                                {{ $config->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    {{--<!-- Modal for Edit -->--}}
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{--<!-- Modal for show -->--}}
    <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{--<!-- Modal for delete -->--}}
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
                     <a href="{{URL::to('rnc/amw/config/index')}}" class="btn btn-default">Cancel</a>
                    <a href="#" class="btn btn-danger danger">Delete</a>

                </div>
            </div>
        </div>
    </div>

    {{--<!-- Modal add new year -->--}}
    <div id="add" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align: center;color: blue;font-size: x-large">Add Config</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'rnc/amw/config/store', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                        @include('rnc::amw.config._form')
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

@stop