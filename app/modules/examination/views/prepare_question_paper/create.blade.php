@extends('layouts.master')

@section('sidebar')
    @include('examination::prepare_question_paper._sidebar')
@stop


@section('content')

        <div style="padding: 10px; width: 90%;">
         <h1>Create Question Paper</h1>

         {{--Error handling--}}
             @if ( $errors->count() > 0 )
                 <div class="alert alert-danger">
                     <ul>
                         @foreach($errors->all() as $message )
                             <li>{{ $message }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif

             {{--set some message after action--}}
             @if (Session::has('message'))
               <div>{{ Session::get('message') }}</div>
             @endif




            {{ Form::open(array('url' => 'prepare_question_paper/store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                @include('examination::prepare_question_paper._form')

            {{ Form::close() }}


@stop