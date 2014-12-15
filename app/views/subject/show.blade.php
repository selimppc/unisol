@extends('layouts.master')

@section('sidebar')
    @include('subject.sidebar')
@stop

@section('content')

      <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-sm-8" style="background: #FFFFFF;width: 1100px">
              <div class="panel-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px">
                 Add New Subject
                </button>
                <a href="" data-toggle="modal" data-target="#myModal"></a>

              <!-- for search box -->
                <div class="row m-t-sm">
                <div class="col-md-12">
                  <section class="panel panel-default">
                <div class="panel-body">
                  <div class="col-md-4 no-padder">
                    <input type="search" name="tblsearch" id="searchStr" class="form-control" placeholder="Onpage Filter"/>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-md-8 pull-right">
                   <div class="wrapper text-right no-padder">
                    {{ Form::open(array('url' =>'subject/list', 'class'=>'form-inline', 'role' => 'form')) }}
                        <div class="form-group">
                          {{ Form::label('search_text', 'Search Text:',array('class'=>'sr-only')) }}
                          {{ Form::text('search_text', Input::old('search_text'), array('class' => 'form-control','placeholder' => 'Search All')) }}
                        </div>
                        {{ Form::submit('Search', array('class' => 'btn btn-info')) }}
                      {{ Form::close() }}
                    </div>
                  </div>
                </div>
            </section>
          </div>
        </div>
    <!-- search ends -->


        {{ Form::open(array('url' => 'batch/delete')) }}
        <table class="table table-bordered" id="myTable">
          <thead>
              <th>
               <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
               </th>
              <th>DepartmentId</th>
              <th>SubjectName</th>
              <th>Description</th>
              <th colspan="2">Action</th>
          </thead>
          <tbody class="searchBody">

          {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button'))}}

            @foreach ($datas as $value)

                <tr>
                  <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}"></td>
                   <td align="left">{{ $value->department_id }}</td>
                   <td>{{ $value->title }}</td>
                   <td>{{ $value->description }}</td>

            <!--   <td>
                  <a class="btn btn-link" href="{{ URL::to('semester/show'.$value->id) }}" >View</a>
                </td> --> 

              <!-- <td> 
                  <a class="btn btn-link" href="{{ URL::to('semester/edit/'.$value->id) }}" class="btn btn-link" data-toggle="modal" data-target="#confirm-edit" href=""  >Edit </a>
                </td> -->

                <td>
                 <a data-href="{{ URL::to('subject/delete/'.$value->id) }}" class="btn btn-link" data-toggle="modal" data-target="#confirm-delete" href="" >Delete</a>
                </td> 
          </tr>

            @endforeach

          </tbody>

        </table>


  
       {{ Form::close() }}

          {{ $datas->links() }}

    
   </div>
  </div>
  </div>
</div>
    <!-- Modal for Edit -->
<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Subject</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
      </div>
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

     <!-- Modal for add new -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New subject</h4>
      </div>
      <div class="modal-body">
       {{ Form::open(array('url' => 'create/subject', 'method' =>'post', 'role'=>'form','files'=>'true')) }}

           @include('subject._form')


            
        {{ Form::close() }}
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cencel</button>
      </div>
      <div class="modal-footer">

        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
      </div>
    </div>
  </div>
</div>

 
@stop