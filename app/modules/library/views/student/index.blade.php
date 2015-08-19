 @extends('layouts.layout')
 @section('top_menu')
     @include('layouts._top_menu')
 @stop
 @section('sidebar')
     @include('layouts._sidebar_student')
 @stop
 @section('content')
 @include('library::show_cart')

 <h3>Library</h3>

 <div class="row">
    <div class="col-md-12 ">
       <div class="box box-solid">
       <br>
           {{-------------- Filter :Starts -------------------------------------------}}
           <div>
               {{ Form::open(array('url' => 'library/student/find-book')) }}
               <div class="col-sm-8">

                  <div class="col-sm-3">
                    {{ Form::label('lib_book_category_id', 'Category') }}
                    {{ Form::select('lib_book_category_id', $book_category_id, Input::old('lib_book_category_id'), array('class' => 'form-control') ) }}
                  </div>

                  <div class="col-sm-3">
                     {{ Form::label('lib_book_author_id', 'Author') }}
                     {{ Form::select('lib_book_author_id', $book_author_id, Input::old('lib_book_author_id'), array('class' => 'form-control') ) }}
                  </div>

                  <div class="col-sm-3">
                    {{ Form::label('lib_book_publisher_id', 'Publisher') }}
                    {{ Form::select('lib_book_publisher_id', $book_publisher_id, Input::old('lib_book_publisher_id'), array('class' => 'form-control')) }}
                  </div>

                  <br><br>
                  {{ Form::submit('Search', array('class'=>' pull-left btn btn-success btn-xs','id'=>'button'))}}
               </div>
               {{ Form::close() }}

           </div>
           <br><br>
            {{-------------- Filter :Ends -------------------------------------------}}
           {{ Form::open(array('url' => 'library/student/batchDelete')) }}
           <p>&nbsp;</p>
              <table id="" class="table table-striped  table-bordered"  >
                 <thead>
                    {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                        <br>
                        <tr>
                           <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                           <th>Title</th>
                           <th>Category</th>
                           <th>Author</th>
                           <th>Publisher</th>
                           <th>Edition</th>
                           <th>Book Type</th>
                           <th>Commercial</th>
                           <th>Book Price(TK.)</th>
                           <th>Sell Price(TK.)</th>
                           <th>Action</th>
                        </tr>
                 </thead>
                 <tbody>
                     @if(isset($model))
                         @foreach($model as $list)
                              <tr>
                                  <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                                  <td>{{ $list->title }}</td>
                                  <td>{{ $list->relLibBookCategory->title }}</td>
                                  <td>{{ $list->relLibBookAuthor->name }}</td>
                                  <td>{{ $list->relLibBookPublisher->name }}</td>
                                  <td>{{ $list->edition }}</td>
                                  <td>{{ $list->book_type }}</td>
                                  <td>{{ $list->commercial }}</td>
                                  <td>{{ $list->book_price }}</td>
                                  <td>{{ $list->digital_sell_price }}</td>
                                  <td>
                                      @if($list['tbftStatus'] == 'paid')
                                          <a href="{{URL::route('student.book.download',['book_id'=>$list->id]) }}" class="btn btn-large btn-primary" title="This Book is Purchased.You Can Download It"><b><i class="fa fa-cloud-download"> Purchased</i></b></a>
                                      @elseif($list['commercial'] == 'free')
                                          <a href="{{URL::route('student.book.download',['book_id'=>$list->id]) }}" class="btn btn-large btn-success" ><i class="fa fa-download"> Download</i></a>
                                      @else
                                          <a href="{{URL::route('student.add-to-cart',['book_id'=>$list->id]) }}" class="btn btn-large btn-info" title="Add To Cart"><i class="fa fa-shopping-cart"> Add To Cart</i></a>
                                      @endif
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

 @stop


 