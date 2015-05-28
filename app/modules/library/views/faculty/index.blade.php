 @extends('layouts.layout')
 @section('top_menu')
     @include('layouts._top_menu')
 @stop
 @section('sidebar')
     @include('layouts._sidebar_faculty')
 @stop

 @section('content')
<div id="cart">
    @include('library::faculty.my_carts')
</div>
<div id="cart-new">
<p style="text-align: center">
    @if(count($all_cart_books))
       <b style="color: lightseagreen">{{count($all_cart_books)}} Book(s) Added In Your Cart.</b>
    @endif
</p>
</div>

 <h3>Library</h3>

 <div class="row">
    <div class="col-md-12 ">
       <div class="box box-solid">
       <!--Include show_cart.blade.php-->
       <br>
           {{-------------- Filter :Starts -------------------------------------------}}
           <div>
               {{ Form::open(array('url' => 'library/faculty/book')) }}

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
                           <th>Price(TK.)</th>
                           <th>Is Rented?</th>
                           <th>Commercial</th>
                           <th>Action</th>
                        </tr>
                 </thead>
                 <tbody>
                     @if(isset($model))
                         @foreach($model as $list)
                              <tr>
                                  <td><input type="checkbox" name="id[]" class="myCheckbox" value=""></td>
                                  <td>
                                  <a href="{{URL::route('faculty.view.book',['book_id'=>$list->id])}}" onclick="showCart()"
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
                                  <td>{{ucfirst($list->commercial)}}
                                  </td>
                                  <td>
                                  @if($list['tbftStatus'] == 'paid')
                                      <a href="{{ URL::route('faculty.book.download',['book_id'=>$list->id])}}"
                                          class="" title="download" style="color:darkturquoise"><b><i class="fa fa-download"></i></b>
                                      </a>
                                      <b><em style="color: dodgerblue">(Purchased)</em></b>

                                  @elseif($list['commercial'] == 'free')
                                        <a href="{{ URL::route('faculty.book.download',['book_id'=>$list->id])}}"
                                          class="btn-link" title="Free download" style="color:#8b0835"><b><i class="fa fa-download"></i> <ins></ins></b>
                                        </a>
                                  @else
                                        <a href="{{ URL::route('faculty.add-book-to-cart',['book_id'=>$list->id]) }}" id="addCart" onclick="showCart()"
                                          class="btn-link" title="Add To Cart" style="color:darkblue"><b><i class="fa fa-shopping-cart"></i> <ins></ins></b>
                                        </a>
                                  @endif
                                  </td>
                              </tr>
                         @endforeach
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


  <script>
    function showCart(){
          $('#cart-new').html("we are on");
         }
  </script>
 @stop

