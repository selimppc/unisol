<p class="lead">Quick Navigation</p>
<div class="list-group">
    <a href= "{{URL::to('applicant/profile/index') }}" class="list-group-item">Profile</a>
    <a href="{{URL::to('applicant/profile') }}" class="list-group-item">Academic Records</a>
    {{--<a href="{{URL::to('applicant/meta_data') }}" class="list-group-item">Biographical</a>--}}
    <a href="{{URL::to('applicant/personal_info/index') }}" class="list-group-item">Personal Information</a>
    <a href="{{URL::to('applicant/supporting_docs/index') }}" class="list-group-item">Supporting Documents</a>
    <a href="{{URL::to('applicant/extra_curricular') }}" class="list-group-item active">Extra-curricular Activities</a>

    <a href="{{URL::to('applicant/miscellaneous_info/index') }}" class="list-group-item">Miscellaneous Information</a>

</div>