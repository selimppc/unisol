@extends('layouts.master')

@section('sidebar')
    @include('years.sidebar')
@stop

@section('content')

<h1>{{$title}}</h1>
    <div class="container" style="margin-top: 20px">
    <div class="row">
      <div class="col-sm-10" style="background: #FFFFFF">
              <div class="panel-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px">
                 Add New Subject
                </button>
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
  {{ Form::open(array('url' => 'years/batch/delete')) }}
        <table class="table table-bordered" id="myTable">

          <thead>
              <th>
               <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
               </th>
              <th>Id</th>
              <th>YearsName</th>
              <th>Description</th>
              <th colspan="2" width="120px">Action</th>
          </thead>
          <tbody class="searchBody">

          {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

            @foreach ($datas as $value)
              <tr>
                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}"></td>
                 <td class="subTitle">{{ $value->title }}</td>
                 <td class="subDesc">{{ $value->description }}</td>
                 <td>
                   <a data-href="{{ URL::to('subject/delete/'.$value->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>

                   <a data-id="{{ $value->id }}" class="subEdit btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-edit" href="" ><span class="glyphicon glyphicon-edit text-info"></span></a>
                   
                   <a data-id="{{ $value->id }}" class="subDetails btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-details" href="" ><span class="glyphicon glyphicon-list-alt text-info"></span></a>
                  
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


    <!-- Modal add new subject -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Subject</h4>
                </div>
                <div class="modal-body">
                   {{ Form::open(array('url' => 'years/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}

                       @include('years._form')

                  <button type="button" class="btn btn-danger close" data-dismiss="modal">Cencel</button>
                    {{ Form::close() }}

                </div>
                <div class="modal-footer">                  
                </div>
            </div>
        </div>
    </div>


@stop