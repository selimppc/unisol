@extends('layouts.main')

@section('container')

<div class="container" style="margin-top: 20px">
 <div class="row">
  <table class="table table-bordered" id="myTable" style="margin-right: 20px">
    <thead>

          <th>ID</th>
          <th>UserName</th>
          <th>EmailAddress</th>
          <th>User Type</th>
          <th>Target Role</th>
          <th>Security Question</th>
          <th>Security Answer</th>

          <th>Academic Goal Statement</th>
          <th>Personal Statement</th>
          <th>Portfolio</th>

          <th>Academic Honors Received</th>
          <th>Ever Admit Other University</th>
          <th>Admission Test Center</th>

          <th>Level of Education</th>
          <th>Degree Name</th>
          <th>Institution Name</th>
          <th>CGPA</th>

          <th>Name</th>
          <th>Achievement</th>
          <th>Certificate Medal</th>

    </thead>
    <tbody>
      <h4>Users and Others Relation</h4>
         @foreach ($users as $value)
            <tr>
                   <td>{{ $value->id }}</td>
                   <td align="left">{{ $value->username }}</td>
                   <td>{{ $value->email_address }}</td>
                   <td>{{ $value->user_type }}</td>
                   <td>{{ $value->target_role }}</td>
                   <td>{{ $value->security_question }}</td>
                   <td>{{ $value->security_answer }}</td>

                  <td>{{$value->supporting_doc->academic_goal_statement }}</td>
                  <td>{{$value->supporting_doc->personal_statement }}</td>
                  <td>{{$value->supporting_doc->portfolio }}</td>

                  <td>{{$value->miscellaneous_information->academic_honors_received }}</td>
                  <td>{{$value->miscellaneous_information->ever_admit_other_uni }}</td>
                  <td>{{$value->miscellaneous_information->admission_test_center }}</td>

                  <td>{{$value->academic_record->level_of_education }}</td>
                  <td>{{$value->academic_record->degree_name }}</td>
                  <td>{{$value->academic_record->institute_name }}</td>
                  <td>{{$value->academic_record->cgpa }}</td>

                  <td>{{$value->extra_curriculam_activity->name }}</td>
                  <td>{{$value->extra_curriculam_activity->achievement }}</td>
                  <td>{{$value->extra_curriculam_activity->certificate_medal }}</td>

            </tr>
         @endforeach
    </tbody>

  </table>
 </div>
</div>