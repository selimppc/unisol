@extends('layouts.master')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
    {{--<h4>{{$title}}</h4>--}}

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClass">Add Class</button>

    <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
        <th>Title</th>
        <th>Description</th>
        <th>status</th>
        <th>Class date</th>
        <th>Action</th>
        </thead>
        <tbody>

        @foreach ($datas as $value)
            <tr>
        {{--link in blade page :--}}
        {{--{{ HTML::linkAction('method', 'name', ['id' => 1], ['class' => 'abc']) }}--}}
        {{--{{ HTML::linkAction('UserController@logout', 'Logout') }}--}}
        {{--{{ HTML::linkRoute( 'users.delete', 'Delete' , [ 'id' => $user->id ]) }}--}}

                <td>{{$value->title}}</td>
                <td>{{$value->description}}</td>
                <td>{{$value->status}}</td>
                <td></td>

                <td>
                    <a href="" class="subEdit btn btn-xs btn-default" data-toggle="modal" data-target="#edit-modal" href="" ><span class="glyphicon glyphicon-edit text-info"></span></a>

                    <a href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a>
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>

    {{--Start all modal for amw--}}
    {{---------------------------------------------}}

    <!-- Add New class Modal -->
    <!-- Modal add new subject -->
    <div id="addClass" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Class</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'academic/faculty/marksdistitem/class/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    @include('academic::faculty.mark_distribution_courses.marks_dist_item_class.._form')
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@stop