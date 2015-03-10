@extends('layouts.layout')

@section('sidebar')
    @include('user::profile._sidebar_profile')
@stop

@section('content')
   <section class="col-lg-6 connectedSortable">
        <div class="checkbox">
            <div class="icheckbox_minimal" aria-checked="true" aria-disabled="tree" style="position: relative;">
            <input type="checkbox" style="position: absolute; opacity: 0;">
            <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);">
            </ins>
            </div>
        </div>
        <input type="checkbox" class="checkbox">

       <!-- Profile Information -->
       <div class="box box-info">
           <div class="box-header">
               <h3 class="box-title">Profile Information</h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                   <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
               </div><!-- /. tools -->
           </div>
           <div class="box-body">
                <div class="row">
                    <div class="col-lg-6">
                        {{ HTML::image('/img/avatar3.png', 'User Image', ['class'=>'img-circle']) }}
                    </div>
                    <div class="col-lg-6">
                        @if(isset($userProfile))
                            First Name : <b>{{$userProfile->first_name}} </b><br>
                            Last Name : <b>{{$userProfile->last_name}}</b><br>
                            Date of Birth : {{$userProfile->date_of_birth}}<br>
                            Gender : {{$userProfile->gender}}<br>
                            City : {{$userProfile->city}}<br>
                            Zip Code : {{$userProfile->zip_code}}<br>
                            Country : {{$userProfile->country}}
                        @else
                            {{"No Profile data found !"}}
                        @endif
                    </div>

                </div>
           </div>
           <div class="box-footer clearfix">
               <button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>
           </div>
       </div>
       <!-- Meta Information -->
      <div class="box box-info">
          <div class="box-header">
              <h3 class="box-title">Meta Information</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                  <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div><!-- /. tools -->
          </div>
          <div class="box-body">
                @if(isset($userMeta))
                    Father's Name : <b>{{$userMeta->fathers_name}} </b><br>
                    Mother's Name : <b>{{$userMeta->mothers_name}}</b><br>
                    NID : {{$userMeta->national_id}}<br>
                    Place of Birth : {{$userMeta->place_of_birth}}<br>
                    Nationality : {{$userMeta->nationality}}<br>
                @else
                    {{"No Meta data found !"}}
                @endif
          </div>
          <div class="box-footer clearfix">
              <button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>
          </div>
      </div>
   </section>

   <section class="col-lg-6 connectedSortable">
          <!-- User Academic Records -->
          <div class="box box-info">
              <div class="box-header">
                  <h3 class="box-title">My Academic Records</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                      <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
              </div>
              <div class="box-body">
                @if(isset($academicRecords))
                    @foreach($academicRecords as $key => $value)
                        Level Of Education : <b>{{$userMeta->level_of_education}} </b><br>
                        Degree Level : <b>{{$userMeta->degree_name}}</b><br>
                        Education Medium : {{$userMeta->education_medium}}<br>
                        Year of Passing : {{$userMeta->year_of_passing}}<br><br><br>
                    @endforeach
                @else
                    {{"No Academic Record(s) found !"}}
                @endif
              </div>
              <div class="box-footer clearfix">
                  <button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>
              </div>
          </div>

      </section>
@stop