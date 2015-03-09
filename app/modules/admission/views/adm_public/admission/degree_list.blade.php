@extends('layouts.master')
@section('sidebar')

@stop
@section('content')

     <h3> Degree List </h3>

<br>

{{ Form::open(['route' => ['admission.degree_apt_save']]) }}

 {{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                       <td class="col-lg-1"><input name="checkbox" type="checkbox" id="checkbox" class="checkbox" value=""></td>
                       <th class="col-lg-4" > degree Name</th>
                       <th >Description</th>
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


  {{ Form::submit('Apply All', array('class'=>'pull-right btn btn-info'))}}

  {{ Form::close() }}
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

@stop

