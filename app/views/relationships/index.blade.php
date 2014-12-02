@extends('layouts.home')

@section('container')

  <div class="container" style="margin-top: 20px">
    <div class="row">
        <table class="table table-bordered" id="myTable">
          <thead>
          <th>UserID</th>
          <th>UserName</th>
          <th>EmailAddress</th>
          <th>UserType</th>
          <th>FullName</th>
          <th>FathersName</th>
          <th>MothersName</th>
          <th>Date of Birth</th>
          <th>Gender</th>
          <th>City</th>
          <th>State</th>
          <th>Country</th>
          <th>ZipCode</th>
          <th>IpAddress</th>

          </thead>
          <tbody class="">
          <h4>UserProfile</h4>
            @foreach ($users as $value)

                <tr>
                   <td>{{ $value->id }}</td>
                   <td align="left">{{ $value->username }}</td>
                   <td>{{ $value->email_address }}</td>
                   <td>{{ $value->user_type }}</td>
                   <td>{{$value->user_profiles->first_name ." ". $value->user_profiles->middle_name ." ". $value->user_profiles->last_name }}</td>
                   <td>{{$value->user_meta->fathers_name }}</td>
                   <td>{{$value->user_meta->mothers_name }}</td>
                   <td>{{$value->user_profiles->date_of_birth }}</td>
                   <td>{{$value->user_profiles->gender }}</td>
                   <td>{{$value->user_profiles->city }}</td>
                   <td>{{$value->user_profiles->state }}</td>
                   <td>{{$value->user_profiles->country }}</td>
                   <td>{{$value->user_profiles->zip_code }}</td>
                   <td>{{ $value->ip_address }}</td>

               </tr>

            @endforeach

          </tbody>

        </table>
    </div>
</div>