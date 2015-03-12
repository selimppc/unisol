@extends('layouts.layout')
@section('sidebar')

@stop
@section('content')


{{-----------------------------------Data Table : Degree List starts-----------------------------------------------------}}

<div class="box box-solid box-info">

     <div class="box-header">
             <h3 class="box-title">Degree List</h3>
             <div class="box-tools pull-right">
                 <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
     </div>

     <div class="box box-info">
           <div class="box-header">
           <p>&nbsp;</p>
           </div>
               <div class="box-body">
                    <div class="row">

                        <div class="col-lg-12">
                           {{ Form::open(['route' => ['admission.degree_apt_save']]) }}
                           <table class="table table-bordered table-striped">
                               <thead>
                                     <tr>
                                          <td class="col-lg-1"><input name="checkbox" type="checkbox" id="checkbox" class="checkbox" value=""></td>
                                          <th class="col-lg-4" style="font-size: medium">Degree Name</th>
                                          <th style="font-size: medium">Description</th>
                                     </tr>
                               </thead>

                                  <tbody>
                                        @foreach($degreeList as $value)
                                              <tr >
                                                     <td> <input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{ $value->id }}"></td>
                                                     <td>
                                                             <a href="{{ URL::route('admission.degree_details',
                                                             ['degree_id' => $value->id]) }}">
                                                             {{ $value->title }}
                                                             </a>
                                                     </td>
                                                     <td>{{ $value->description }}</td>
                                              </tr>
                                        @endforeach
                                  </tbody>
                           </table>
                           <p>&nbsp;</p>
                           {{ Form::submit('Apply All', array('class'=>'pull-right btn btn-info'))}}

                           {{ Form::close() }}
                        </div>
                    </div>
               </div>

     </div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>

@stop

