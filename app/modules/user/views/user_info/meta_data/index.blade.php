@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @if($user_role=="amw")
       @include('layouts._sidebar_amw')
    @elseif($user_role=="faculty")
       @include('layouts._sidebar_faculty')
    @elseif($user_role=="student")
       @include('layouts._sidebar_student')
    @elseif($user_role=="hr")
       @include('layouts._sidebar_hr')
    @elseif($user_role=="librarian")
       @include('layouts._sidebar_librarian')
    @elseif($user_role=="cfo")
       @include('layouts._sidebar_cfo')
    @endif
@stop
@section('content')
    <!-- left column -->
    <div style="background-color:#ffffff">
        <section class="col-lg-12"style="background-color:#ffffff">
            <p>&nbsp;</p>
            <div class="col-lg-4"><b style="color: #000000">Biographical Information</b>
            <p>
                @if(isset($userMeta))
                   <span class="text-muted ">You Can Change Your Signature From Here.
                       <a href="{{Route('user/meta-data/signature',['id'=>$userMeta->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Add/Change Signature. </ins></a>
                   </span>
                @endif
            </p>
            </div>
            <div class="col-lg-8" style="background-color:aliceblue">
               <table class="table table-striped  table-bordered">
                   @if(isset($userMeta))
                      <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/meta-data/edit',['id'=>$userMeta->id]) }}" data-toggle="modal" data-target="#myeditModal" ><i class="fa fa-arrow-circle-right"></i> <b>Edit</b> </a>
                   @else
                     <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/meta-data/create')}}" data-toggle="modal" data-target="#meta-modal" ><b>+ Add</b></a>
                   @endif
                   <p>&nbsp;</p>
                   @if(isset($userMeta))
                        <tr>
                            <th >Father's Name</th>
                            <td>{{$userMeta->fathers_name}}</td>
                        </tr>

                        <tr>
                            <th >Father's Occupation</th>
                            <td>{{$userMeta->fathers_occupation}}</td>
                        </tr>

                        <tr>
                            <th >Is Freedom Fighter?</th>
                            <td>{{$userMeta['freedom_fighter']==1 ? 'Yes' : 'No'}}</td>
                        </tr>

                        <tr>
                            <th>Father's Phone</th>
                            <td>{{$userMeta->fathers_phone}}</td>
                        </tr>

                        <tr>
                            <th>Mother's Name</th>
                            <td>{{$userMeta->mothers_name}}</td>
                        </tr>

                        <tr>
                            <th >Mother's Occupation</th>
                            <td>{{$userMeta->mothers_occupation}}</td>
                        </tr>

                        <tr>
                            <th>Mother's Phone</th>
                            <td>{{$userMeta->mothers_phone}}</td>
                        </tr>

                        <tr>
                            <th>Marital Status</th>
                            <td>
                               {{strtoupper($userMeta->marital_status)}}
                            </td>
                        </tr>

                        <tr>
                            <th>Religion</th>
                            <td>{{$userMeta->religion}}</td>
                        </tr>

                        <tr>
                            <th>Present Address</th>
                            <td>{{$userMeta->present_address}}</td>
                        </tr>

                        <tr>
                            <th>Permanent Address</th>
                            <td>{{$userMeta->permanent_address}}</td>
                        </tr>
                        <tr>
                            <th>Signature</th>
                            <td>
                                {{ $userMeta->signature != null ? HTML::image('/uploads/user_images/docs/'.$userMeta->signature) : HTML::image('/img/default_sig.png', 'Signature') }}<br>
                                <a href="{{Route('user/meta-data/signature',['id'=>$userMeta->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Add/Change Signature.</ins></a>
                            </td>
                        </tr>
                   @else
                         {{"No Biographical Information found !"}}
                   @endif
               </table>
            </div>
        </section>
        <p>&nbsp;</p>
        <hr>
        {{ Form::open(array('route' => 'user/meta-data/store','files'=>'true')) }}
           @include('user::user_info.meta_data._modal')
        {{ Form::close() }}
    </div>

<!-- Modal  -->
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">

        </div>
    </div>
 </div>

 {{--modal: change image--}}
     <div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">

             </div>
         </div>
     </div>

     {{--Meta data:Modal --}}

     <div class="modal fade" id="meta-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" style="z-index:1050">
             <div class="modal-content">

             </div>
         </div>
      </div>
     <!-- Modal : edit -->
     <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" style="z-index:1050">
             <div class="modal-content">

             </div>
         </div>
     </div>

     <style>
     hr {
         display: block;
         margin-top: 0.5em;
         margin-bottom: 0.5em;
         margin-left: auto;
         margin-right: auto;
         border-style: inset;
         border-width: 1px;
     }
     </style>

@stop

