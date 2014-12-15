@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop


@section('content')
    @if($errors->any())
      <div>
        <ul>
          {{ implode('', $errors->all('<li>:message</li>'))}}
        </ul>
      </div>
    @endif

    @if (Session::has('message'))
      <div>{{ Session::get('message') }}</div>
    @endif

    <table>
      <tr>
        <th>Title</th>
        <td>{{ $degree_levels->title }}</td>
        <th>Description</th>
        <td>{{ $degree_levels->description }}</td>
      </tr>
    </table>

@stop