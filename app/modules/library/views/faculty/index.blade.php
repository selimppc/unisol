 @extends('layouts.layout')
 @section('sidebar')
     @include('layouts._sidebar_faculty')
 @stop
 @section('content')
 {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('examination.amw.create-exam') }}" data-toggle="modal" data-target="#exam-data" style="color: #ffffff" title="New Examination"><b>+ Add Examination</b></a>--}}
 <h3>Library</h3>

 <div class="row">
    <div class="col-md-12 ">
       <div class="box box-solid">
       <br>
           {{-------------- Filter :Starts -------------------------------------------}}
           <div>
               {{ Form::open(array('url' => 'library/faculty/book')) }}
               {{--<div class="input-group input-group-sm">--}}
                   {{--<div class="input-group-btn">--}}
                       {{--<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Action <span class="fa fa-caret-down"></span></button>--}}
                       {{--<ul class="dropdown-menu">--}}
                           {{--<li><a href="#">Action</a></li>--}}
                           {{--<li><a href="#">Another action</a></li>--}}
                           {{--<li><a href="#">Something else here</a></li>--}}
                           {{--<li class="divider"></li>--}}
                           {{--<li><a href="#">Separated link</a></li>--}}
                       {{--</ul>--}}
                   {{--</div><!-- /btn-group -->--}}
                   {{--<input type="text" class="form-control">--}}
               {{--</div>--}}
               {{---------------------------------------}}
               <div class="col-sm-8">

                  <div class="col-sm-3">
                    {{ Form::label('lib_book_category_id', 'Category') }}
                    {{ Form::select('lib_book_category_id', [''=>'Select Category' ] + $lib_book_category_id, Input::old('lib_book_category_id'), array('class' => 'form-control') ) }}
                  </div>

                  <div class="col-sm-3">
                     {{ Form::label('lib_book_author_id', 'Author') }}
                     {{ Form::select('lib_book_author_id', $lib_book_author_id, Input::old('lib_book_author_id'), array('class' => 'form-control') ) }}
                  </div>

                  <div class="col-sm-3">
                    {{ Form::label('lib_book_publisher_id', 'Publisher') }}
                    {{ Form::select('lib_book_publisher_id', $lib_book_publisher_id, Input::old('lib_book_publisher_id'), array('class' => 'form-control')) }}
                  </div>

                  {{--<div class="col-sm-3">--}}
                    {{--{{ Form::label('title', 'Book Title') }}--}}
                    {{--{{ Form::select('title', $lib_book_id, Input::old('title'), array('class' => 'form-control')) }}--}}
                  {{--</div>--}}
                  <br><br>
                  {{ Form::submit('Search', array('class'=>' pull-left btn btn-success btn-xs','id'=>'button'))}}
               </div>
               {{ Form::close() }}
           </div>
           <br><br>
            {{-------------- Filter :Ends -------------------------------------------}}
           {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
           <p>&nbsp;</p>
              <table id="" class="table table-striped  table-bordered"  >
                 <thead>
                    {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                        <br>
                        <tr>
                           <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                           <th>Title</th>
                           <th>ISBN</th>
                           <th>Category</th>
                           <th>Author</th>
                           <th>Publisher</th>
                           <th>Edition</th>
                           <th>Book Type</th>
                           <th>Price</th>
                           <th>Is Rented?</th>
                           <th>Action</th>
                        </tr>
                 </thead>
                 <tbody>
                     @if(isset($model))
                         @foreach($model as $list)
                              <tr>
                                  <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                                  <td>
                                  <a href="{{ URL::route('amw.view-exm-courses') }}"
                                  class="btn-link" title="View Details" style="color:#800080">{{$list->title}}
                                  </a>
                                  </td>
                                  <td>{{$list->isbn}}</td>
                                  <td>{{$list->relLibBookCategory->title}}</td>
                                  <td>{{$list->relLibBookAuthor->name}}</td>
                                  <td>{{$list->relLibBookPublisher->name}}</td>
                                  <td>{{$list->edition}}</td>
                                  <td>{{$list->book_type}}</td>
                                  <td>{{$list->book_price}}</td>
                                  <td>{{$list->is_rented}}</td>
                                  <td>
                                      {{--<a href="" class="btn btn-default btn-xs" data-toggle="modal" data-target="#book" title="Show" style="font-size: 11px;color: darkmagenta"><span class="fa fa-eye"></span></a>--}}
                                      @if($list->is_rented == 'yes')
                                        <a href="{{ URL::route('faculty.add-book-to-cart',['book_id'=>$list->id]) }}"
                                        class="btn-link" title="Add Book" style="color:darkblue"><b><ins>Add To Cart</ins></b>
                                        </a>
                                      @endif
                                      {{--<a data-href="{{URL::route('examination.amw.delete-exam-data', ['id'=>$exam_list->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>--}}
                                  </td>
                              </tr>
                         @endforeach
                         {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('amw.exam-list') }}"  style="color: #ffffff" ><b>All</b></a>--}}

                     @endif
                 </tbody>
              </table>
           {{form::close() }}

           <p>&nbsp;</p>
       </div>
    </div>
 </div>

 <!-- Modal  -->
  <div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">

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

<script>
  $('#addBook').change(function(){
     $.get("{{ url('faculty/store-book/{book_id}')}}",
  });
</script>

 @stop

