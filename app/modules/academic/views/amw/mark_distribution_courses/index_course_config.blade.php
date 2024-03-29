@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <h4 style="text-align: center;margin-bottom: 30px">{{$title}}</h4>
    <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>CourseName</th>
            <th>Department</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $value)
            <tr>
            <td><a href="{{ URL::route('config.show', ['course_id'=>$value->course_id])  }}" class="btn btn-link">{{$value->relCourse->title}}</a></td>
            <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
            <td>{{$value->relYear->title}}</td>
            <td>{{$value->relSemester->title}}</td>
            <td>{{ AcmCourseConfig::getCourseItemStatus($value->course_id, $value->relCourse->evaluation_total_marks) }}</td>
            <td>
                <a href="{{ URL::route('coursefind.show', ['course_id'=>$value->course_id])  }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addNew" data-toggle="tooltip" data-placement="left" title="Mark/Dist" href="">MarksDistConfig</a>

                <a href="{{ URL::route('dist.show', ['id'=>$value->course_id]) }}" class="btn btn-sm btn-success" data-toggle="modal" data-target="#marksDistModal" data-toggle="tooltip" data-placement="left" title="Show/Dist" href="">ViewDistConfig</a>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--Start all modal for amw--}}
    {{---------------------------------------------}}
    <!-- Add New Item Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Show course info Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Show course marksdistribution Modal -->
    <div class="modal fade" id="marksDistModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

{{--amw ajax delete in popup--}}
@section('script_section')
    <script>
        function deleteNearestTr(getId, acmId)
        {
            var is_config_id = acmId;
            var url = '{{URL::to('academic/amw/config/acmconfigdelete/ajax')}}' ;
            console.log(url);
            if(is_config_id > 0){

                var check = confirm("Are you sure to delete this item??");
                if(check)
                {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {acm_course_config_id: is_config_id}
                    })
                            .done(function(msg) {
                                console.log(msg);
                                var whichtr = $('#'+getId).closest("tr");
                                whichtr.fadeOut(500).remove();
                                arrayItems.pop(getId);//To stop additem if exist
                            });
                }
                else
                {
                    return false;
                }

            }else{
                //if acm_course_config id not found jst remove the tr form the popup. that will not delete the data form the db.
                var whichtr = $('#'+getId).closest("tr");
                whichtr.fadeOut(500).remove();
                arrayItems.pop(getId);//To stop additem if exist
            }

        }
    </script>

@stop