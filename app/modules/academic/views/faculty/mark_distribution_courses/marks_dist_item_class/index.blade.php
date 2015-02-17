@extends('layouts.master')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
    <h4>{{$title}}</h4>

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

        {{--@foreach ($datas as $value)--}}
            {{--<tr>--}}
        {{--link in blade page :--}}
        {{--{{ HTML::linkAction('method', 'name', ['id' => 1], ['class' => 'abc']) }}--}}
        {{--{{ HTML::linkAction('UserController@logout', 'Logout') }}--}}

                {{--<td><a href="{{ URL::route('coursemarksdist.show', ['cm_id'=>$value->id])  }}" class="btn btn-link">{{$value->relCourse->title}}</a></td>--}}
                {{--<td>{{$value->relCourse->relSubject->relDepartment->title}}</td>--}}
                {{--<td>{{$value->relYear->title}}</td>--}}
                {{--<td>{{$value->relSemester->title}}</td>--}}
                {{--<td>{{ AcmMarksDistribution::getMarksDistItemStatus($value->id, $value->relCourse->evaluation_total_marks) }}</td>--}}

                {{--<td>--}}
                    {{--<a href="{{ URL::route('marksdistfind.show', ['course_id'=>$value->course_id])  }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#marksDist" data-toggle="tooltip" data-placement="left" title="Mark/Dist" href="">MarksDist</a>--}}

                    {{--<a href="{{ URL::route('marksdist.show', ['cm_id'=>$value->id])  }}" class="btn btn-success" data-toggle="modal" data-target="#showMarksDist" data-toggle="tooltip" data-placement="left" title="Show/View" href="">View Dist</a>--}}

                {{--</td>--}}
            {{--</tr>--}}
        {{--@endforeach--}}

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
                    {{ Form::open(array('url' => '', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    @include('academic::faculty.mark_distribution_courses.marks_dist_item_class.._form')
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
                    <a href="{{URL::to('academic/faculty/marksdistitem/class')}}" class="btn btn-default">Close </a>
                </div>
            </div>
        </div>
    </div>

@stop